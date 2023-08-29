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
        return config('services.pirsch.access_key') &&
            'GET' === $request->method() &&
            ! $request->hasHeader('X-Livewire') &&
            // I'm always on the blog, I don't want to track my own visits.
            1 !== auth()->id() &&
            // Tracking for posts will happen in ShowPostController to avoid
            // tracking visits on the ones that don't exist anymore.
            ! $request->routeIs('filament.*', 'horizon.*', 'merchants.show', 'posts.show');
    }
}
