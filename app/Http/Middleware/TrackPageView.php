<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackPageView
{
    public function handle(Request $request, \Closure $next, string ...$guards) : Response
    {
        return $next($request);
    }

    public function terminate(Request $request, Response $response) : void
    {
        if (
            config('services.pirsch.access_key') &&
            'GET' === $request->method() &&
            ! $request->hasHeader('X-Livewire') &&
            1 !== auth()->id() &&
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
    }
}
