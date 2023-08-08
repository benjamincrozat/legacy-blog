<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Posts\Post;

class ShowPostController extends Controller
{
    public function __invoke(Post $post) : View
    {
        return view('posts.show', [
            'post' => $post,
            'recommended' => cache()->remember(
                "post_{$post->id}_recommendations",
                24 * 3600, // 24 hours.
                fn () => $post->recommendations,
            ),
        ]);
    }
}
