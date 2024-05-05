<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitedPages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $req, Closure $next)
    {
        $response = $next($req);

        $visitedPages = $req->cookie('visited-pages');
        $visitedPages = $visitedPages ? json_decode($visitedPages, true) : [];

        $pageName = str_replace(url('/'), '', $req->url());

        $pageData = ['pageName' => $pageName, 'time' => Carbon::now()->toDateTimeString()];
        $visitedPages[] = $pageData;

        $response->cookie('visited-pages', json_encode($visitedPages), 60);

        return $response;
    }
}
