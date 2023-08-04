<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
            // I dispatch the request instead of using a terminatable middleware.
            // It's easier to test in my local and testing environments.
            $pendingDispatch = dispatch(
                new \App\Jobs\TrackPageView(
                    $request->fullUrl(),
                    $request->ip(),
                    $request->userAgent(),
                    $request->header('Accept-Language'),
                    $request->header('Referer')
                )
            );

            if (! app()->isLocal() && ! app()->runningUnitTests()) {
                $pendingDispatch->afterResponse();
            }
        }

        return $next($request);
    }
}
