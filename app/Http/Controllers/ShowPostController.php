<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Jobs\TrackPageView;
use App\Facades\Posts;

class ShowPostController extends Controller
{
    public function __invoke(string $slug) : View
    {
        $post = Posts::get($slug);

        abort_if(is_null($post), 404);

        // I track visits for posts after it's been resolved to avoid messing up my analytics.
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
            'recommendations' => Posts::recommendations($post->id),
        ]);
    }
}
