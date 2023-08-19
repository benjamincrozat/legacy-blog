<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Support\Collection;

class ShowPostController extends Controller
{
    public function __invoke(Post $post) : View
    {
        return view('posts.show', compact('post') + [
            'recommended' => cache()->remember(
                "post_{$post->id}_recommendations",
                24 * 60 * 60, // 24 hours.
                fn () : Collection => $post->recommendations,
            ),
        ]);
    }
}
