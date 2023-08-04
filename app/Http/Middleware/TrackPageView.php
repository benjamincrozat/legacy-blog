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
        'recommends/{affiliate}',
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
            $fullUrl = $request->fullUrl();
            $ip = $request->ip();
            $userAgent = $request->userAgent();
            $acceptLanguage = $request->header('Accept-Language');
            $referrer = $request->header('Referer');

            // I dispatch the request instead of using a terminatable middleware.
            // It's easier to test in my local and testing environments.
            dispatch(function () use ($fullUrl, $ip, $userAgent, $acceptLanguage, $referrer) {
                Http::withToken(config('services.pirsch.access_key'))
                    ->retry(3)
                    ->post('https://api.pirsch.io/api/v1/hit', [
                        'url' => $fullUrl,
                        'ip' => $ip,
                        'user_agent' => $userAgent,
                        'accept_language' => $acceptLanguage,
                        'referrer' => $referrer,
                    ])
                    ->throw();
            });
        }

        return $next($request);
    }
}
