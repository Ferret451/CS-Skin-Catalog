<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function create()
    {
        $data = [
            'about' => 'The CS Skins catalog offers a wide selection of stylish skins for your playable character in Counter-Strike.
                    Here you will find over 100.000 of popular items, new arrivals, as well as special offers and discounts on the best products.
                    Click the next button to get full experience.',
            'forDevsDesc' => 'We are using steam API to get information for catalog. You can see example of the
                    request next:',
            'apiLink' => 'https://steamcommunity.com/market/search/render?norender=1&start=1&count=99&appid=730',
            'githubDesc' => 'For more information go to github page, where you can find exact want you want about steam API:',
            'githubLink' => 'https://github.com/Revadike/InternalSteamWebAPI/wikim',
            'emailDesc' => 'You can write us about your experience on the next email:',
            'email' => 'fakemail@gmail.com',
            'phoneDesc' => 'Or even call us and we will answer as soon as we can:',
            'phone' => '+5 (55) 555-55-55',
        ];

        foreach ($data as $key => $value) {
            $data[$key] = preg_replace(
                '/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,3}/',
                '<span style="color: red;">$0</span>',
                $value
            );

            $data[$key] = preg_replace(
                '/(https?|ftp):\/\/[^?\s]+/',
                '<span style="color: green;">$0</span>',
                $data[$key]
            );

            $data[$key] = preg_replace(
                '/\d+(\.\d+)?/',
                '<span style="color: blue;">$0</span>',
                $data[$key]
            );
        }

        return view('home', $data);
    }
}
