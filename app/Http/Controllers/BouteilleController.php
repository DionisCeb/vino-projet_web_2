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
            $title = trim($node->text());
            echo "Wine Title: $title\n";

            Bouteille::create(['title' => $title]);
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
