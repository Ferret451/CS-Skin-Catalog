<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitedPagesController extends Controller
{
    public function index(Request $req)
    {
        $visitedPagesString = $req->cookie('visited_page');
        $visitedPages = json_decode($visitedPagesString, true);

        return view('visited_pages')->with('visitedPages', $visitedPages ?? []);
    }

    public function clear(Request $req) {
        cookie()->forget('visited_page');

        return redirect()->back();
    }
}
