<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class TrackPageView
{
    public function handle(Request $request, \Closure $next, string ...$guards) : Response
    {
        return $next($request);
    }

    public function terminate(Request $request, Response $response) : void
    {
        if ($this->shouldTrack($request)) {
            $url = $request->fullUrl();
            $ip = $request->ip();
            $user_agent = $request->userAgent();
            $accept_language = $request->header('Accept-Language');
            $referrer = $request->header('Referer');

            Http::withToken(config('services.pirsch.access_key'))
                ->retry(3)
                ->post('https://api.pirsch.io/api/v1/hit', compact('url', 'ip', 'user_agent', 'accept_language', 'referrer'))
                ->throw();
        }
    }

    protected function shouldTrack(Request $request) : bool
    {
        return config('services.pirsch.access_key') &&
            'GET' === $request->method() &&
            ! $request->hasHeader('X-Livewire') &&
            1 !== auth()->id() &&
            ! str_contains($request->path(), 'admin') &&
            ! str_contains($request->path(), 'horizon') &&
            ! str_contains($request->path(), 'recommends/');
    }
}
