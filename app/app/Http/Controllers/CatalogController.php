<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        // Массив с товарами (временно)
        $products = [
            [
                'id' => 1,
                'img' => 'img',
                'name' => 'M4A1 Howl',
            ],
            [
                'id' => 2,
                'img' => 'img',
                'name' => 'M4A1 Howl',
            ],
            [
                'id' => 3,
                'img' => 'img',
                'name' => 'M4A1 Howl',
            ],
            [
                'id' => 4,
                'img' => 'img',
                'name' => 'M4A1 Howl',
            ],
            [
                'id' => 5,
                'img' => 'img',
                'name' => 'M4A1 Howl',
            ],
        ];

        return view('catalog', compact('products'));
    }
}
