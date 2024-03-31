<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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

        $visitedPages = $req->cookie('visited_page');
        $visitedPages = $visitedPages ? json_decode($visitedPages, true) : [];

        $pageName = str_replace(url('/'), '', $req->url());

        $visitedPages[] = $pageName;

        $response->cookie('visited_page', json_encode($visitedPages), 60);

        return $response;
    }

}
