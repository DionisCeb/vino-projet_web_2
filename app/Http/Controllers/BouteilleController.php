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
            echo "Scraping: $nextUrl\n";
            $nextUrl = $this->scrapeSAQWines($nextUrl, $client);
        }

        return "Scraping completed!";
    }

    /**
     * Scrape les titres des bouteilles sur une page et gère la pagination.
     */
    private function scrapeSAQWines($url, $client)
    {
        $crawler = $client->request('GET', $url);

        $crawler->filter('a.product-item-link')->each(function ($node) {
            // Extract the title
            $title = trim($node->text());

            // Find the closest price container and extract the price
            $priceNode = $node->closest('li.product-item')
                            ->filter('.price-box .price')
                            ->first();

            $price = $priceNode->count() ? trim($priceNode->text()) : 'N/A';

            echo "Wine Title: $title | Price: $price\n";

            // Insert the title and price into the database
            Bouteille::create([
                'title' => $title,
                'price' => $price
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
}