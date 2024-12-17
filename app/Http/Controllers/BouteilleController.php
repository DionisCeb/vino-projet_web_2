<?php

namespace App\Http\Controllers;

use App\Models\Bouteille;
use Goutte\Client;
use Illuminate\Http\Request;

class BouteilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bottle.index');
    }

    /**
     * Lance le scraping des bouteilles depuis le site de la SAQ en parcourant plusieurs pages.
     */
    public function scrape()
    {
        set_time_limit(0);

        $client = new Client();
        $nextUrl = "https://www.saq.com/en/products/wine";

        while ($nextUrl) {
            echo "Dionis' custom scraping hook for URL: $nextUrl\n";
            $nextUrl = $this->scrapeSAQWines($nextUrl, $client);
        }

        return "Dionis' Scraping completed!";
    }

    /**
     * Scrape les titres des bouteilles sur une page et gère la pagination.
     */
    private function scrapeSAQWines($url, $client)
    {
        $crawler = $client->request('GET', $url);
    
        $crawler->filter('li.product-item')->each(function ($node) use ($client) {
            // Extract the title
            $titleNode = $node->filter('a.product-item-link');
            $title = $titleNode->count() ? trim($titleNode->text()) : 'N/A';
    
            // Extract the price
            $priceNode = $node->filter('.price-box .price');
            $price = $priceNode->count() ? trim($priceNode->text()) : 'N/A';
    
            // Extract the SAQ link (href attribute)
            $linkNode = $node->filter('a.product-item-photo');
            $saqLink = $linkNode->count() ? $linkNode->attr('href') : 'N/A';
    
            echo "Scraping Details for: $title | $saqLink\n";
    
            // Visit the detailed page to extract the SAQ code
            $detailedData = $this->scrapeBouteilleDetails($saqLink, $client);
    
            // Insert the data into the database
            Bouteille::create([
                'title' => $title,
                'price' => $price,
                'saq_link' => $saqLink,
                'saq_code' => $detailedData['saq_code'] ?? 'N/A',
                'country' => $detailedData['country'] ?? 'N/A',
                'region' => $detailedData['region'] ?? 'N/A',
                'degree_alcohol' => $detailedData['degree_alcohol'] ?? 'N/A',
                'color' => $detailedData['color'] ?? 'N/A',
                'size' => $detailedData['size'] ?? 'N/A',
            ]);
        });
    
        // Handle pagination
        try {
            $nextPage = $crawler->filter('a.action.next')->attr('href');
            return $nextPage ?: null;
        } catch (\InvalidArgumentException $e) {
            return null;
        }
    }

    /**
     * Scrape detailed information for a specific wine bottle from its SAQ page.
     */
    private function scrapeBouteilleDetails($url, $client) {
            $crawler = $client->request('GET', $url);

            // Helper function to extract data by "data-th" attribute
            $extractData = function ($field) use ($crawler) {
                $selector = "ul.list-attributs li strong[data-th=\"$field\"]";
                return $crawler->filter($selector)->count() ? trim($crawler->filter($selector)->text()) : 'N/A';
            };

            // Extract details using the helper function
            $saqCode = $extractData('SAQ code');
            $country = $extractData('Country');
            $region = $extractData('Region');
            $degreeAlcohol = $extractData('Degree of alcohol');
            $color = $extractData('Color');
            $size = $extractData('Size');

            return [
                'saq_code' => $saqCode,
                'country' => $country,
                'region' => $region,
                'degree_alcohol' => $degreeAlcohol,
                'color' => $color,
                'size' => $size,
            ];
        }
}
