<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CatalogController extends Controller
{
    private string $baseUrl = 'https://community.akamai.steamstatic.com/economy/image/';
    private int $appID = 730;

    public function index(Request $req)
    {
        $items_count = 42;

        $curr_page = $req->input('page', 0);
        $prev_page = $curr_page <= 0 ? 0 : ($curr_page - 1);
        $next_page = $curr_page + 1;

        $start = $items_count * $curr_page;

        $query = $req->input('query');

        try {
            $client = new Client([
                'verify' => false,
            ]);

            $response = $client->get("https://steamcommunity.com/market/search/render?norender=1&start=$start&count=$items_count&query=$query&appid=$this->appID");
            $data = json_decode($response->getBody(), true);
            $results = $data['results'];

            $products = [];
            foreach ($results as $item) {
                $products[] = [
                    'hash_name' => $item['hash_name'],
                    'sell_price_text' => $item['sell_price_text'],
                    'icon_url' => $this->baseUrl . $item['asset_description']['icon_url'],
                ];
            }

            return view('catalog', compact('products', 'curr_page', 'prev_page', 'next_page'));
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    public function showLot($id) {
        $client = new Client([
            'verify' => false,
        ]);
        $response = $client->get("https://steamcommunity.com/market/search/render?norender=1&query=$id&appid=$this->appID");
        $data = json_decode($response->getBody(), true);
        $results = $data['results'];
        
        foreach ($results as $item) {
            if ($item['hash_name'] === $id) {
                $desiredObject = $item;

                $productInfo = [
                    'name' => $desiredObject['name'],
                    'hash_name' => $desiredObject['hash_name'],
                    'sell_price_text' => $desiredObject['sell_price_text'],
                    'icon_url' => $this->baseUrl . $desiredObject['asset_description']['icon_url']
                ];

                return view('product', compact('productInfo'));
            }
        }

        $exception = new NotFoundHttpException('Not found');
        return response()->json(['error' => $exception->getMessage()], $exception->getCode());
    }
}
