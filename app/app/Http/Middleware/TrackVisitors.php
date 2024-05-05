<?php

namespace App\Http\Middleware;

use App\Models\Tracker;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $agent = new Agent();
        $agent->setUserAgent($request->header('User-Agent'));

        $conditions = [
            'ip' => $request->ip(),
            'os' => $agent->platform(),
            'browser' => $agent->browser() ? ($agent->browser() . '/' . $agent->version($agent->browser())) : '',
        ];

        $existingRecord = Tracker::where($conditions)->first();

        if (!$existingRecord) {
            Tracker::create($conditions);
        }

        return $next($request);
    }
}
