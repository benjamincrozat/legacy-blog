<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackPageView
{
    /**
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) : Response
    {
        if (
            config('services.pirsch.access_key') &&
            'GET' === $request->method() &&
            ! $request->hasHeader('X-Livewire') &&
            ! str_contains($request->path(), 'admin') &&
            ! str_contains($request->path(), 'horizon') &&
            ! str_contains($request->path(), 'recommends/')
        ) {
            // I dispatch the request instead as a job of using terminate().
            // It's easier to test in my local and testing environments.
            \App\Jobs\TrackPageView::dispatch(
                $request->fullUrl(),
                $request->ip(),
                $request->userAgent(),
                $request->header('Accept-Language'),
                $request->header('Referer')
            );
        }

        return $next($request);
    }
}
