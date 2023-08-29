<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use App\Jobs\TrackPageView;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ShowPostController extends Controller
{
    public function __invoke(Request $request, Post $post) : View
    {
        dispatch(
            new TrackPageView(
                $request->fullUrl(),
                $request->ip(),
                $request->userAgent(),
                $request->header('Accept-Language'),
                $request->header('Referer')
            )
        )->afterResponse();

        return view('posts.show', compact('post') + [
            'recommendations' => cache()->remember(
                "post_{$post->id}_recommendations",
                24 * 60 * 60, // We cache the recommendations for 24 hours to account for the new content that will be created.
                fn () : Collection => $post->recommendations,
            ),
        ]);
    }
}
