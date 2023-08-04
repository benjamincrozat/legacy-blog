<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class TrackPageView
{
    protected $except = [
        'horizon/',
        'nova/',
        'recommends/',
        'telescope/',
    ];

    /**
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) : Response
    {
        if (
            config('services.pirsch.access_key') &&
            auth()->guest() &&
            'GET' === $request->method() &&
            ! $request->hasHeader('X-Livewire') &&
            ! in_array($request->route()->uri, $this->except)
        ) {
            Http::withToken(config('services.pirsch.access_key'))
                ->retry(3)
                ->post('https://api.pirsch.io/api/v1/hit', [
                    'url' => $request->fullUrl(),
                    'ip' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'accept_language' => $request->header('Accept-Language'),
                    'referrer' => $request->header('Referer'),
                ])
                ->throw();
        }

        return $next($request);
    }
}
