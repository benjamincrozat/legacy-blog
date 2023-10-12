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
        if ($this->shouldTrack($request)) {
            dispatch_sync(
                new \App\Jobs\TrackPageView(
                    $request->fullUrl(),
                    $request->ip(),
                    $request->userAgent(),
                    $request->header('Accept-Language'),
                    $request->header('Referer')
                )
            );
        }
    }

    protected function shouldTrack(Request $request) : bool
    {
        if (! config('services.pirsch.access_key')) {
            return false;
        }

        if ($request->hasHeader('X-Livewire')) {
            return false;
        }

        // I'm always on the blog, let's not inflate the numbers.
        if (1 === auth()->id()) {
            return false;
        }

        // Check \App\Http\Controllers\ShowPostController to see
        // why I blocked posts.show at the middleware level.
        if ($request->routeIs('filament.*', 'horizon.*', 'merchants.show', 'posts.show')) {
            return false;
        }

        if ('GET' !== $request->method()) {
            return false;
        }

        return true;
    }
}
