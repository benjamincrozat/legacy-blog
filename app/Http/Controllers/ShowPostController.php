<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use App\Jobs\TrackPageView;
use Illuminate\Support\Collection;

class ShowPostController extends Controller
{
    public function __invoke(Post $post) : View
    {
        // I track visits for posts after it's been resolved to avoid messing up my analytics.
        // Articles that have been removed but are still listed on Google might get clicks.

        dispatch(
            new TrackPageView(
                request()->fullUrl(),
                request()->ip(),
                request()->userAgent(),
                request()->header('Accept-Language'),
                request()->header('Referer')
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
