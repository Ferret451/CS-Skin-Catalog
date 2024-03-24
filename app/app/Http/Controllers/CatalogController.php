<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CatalogController extends Controller
{
    public function index(Request $req)
    {
        $items_count = 99;

        $curr_page = $req->input('page', 0);
        $prev_page = $curr_page <= 0 ? 0 : ($curr_page - 1);
        $next_page = $curr_page + 1;

        $start = $items_count * $curr_page;

        try {
            $client = new Client([
                'verify' => false,
            ]);

            $response = $client->get("https://steamcommunity.com/market/search/render?norender=1&start={$start}&count={$items_count}&appid=730");
            $data = json_decode($response->getBody(), true);
            $results = $data['results'];

            $baseUrl = 'https://community.akamai.steamstatic.com/economy/image/';
            $products = [];
            foreach ($results as $item) {
                $products[] = [
                    'hash_name' => $item['hash_name'],
                    'sell_price_text' => $item['sell_price_text'],
                    'icon_url' => $baseUrl . $item['asset_description']['icon_url'],
                ];
            }

            return view('catalog', compact('products', 'curr_page', 'prev_page', 'next_page'));
        } catch (RequestException $e) {
            // Обработка ошибки запроса
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }
}
