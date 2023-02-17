<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class ShowPostController extends Controller
{
    public function __invoke(Post $post) : View
    {
        return view('posts.show', [
            'bestProducts' => $post->bestProducts()->with('affiliate')->get(),
            'post' => $post,
            'recommended' => Post::with('user')
                ->withRecommendations(
                    recommendations: cache()->remember(
                        "post_{$post->id}_recommendations",
                        24 * 60 * 60,
                        fn () => $post->recommendations
                    ),
                    excluding: $post->id,
                    ai: $post->ai
                )
                ->limit(10)
                ->get(),
        ]);
    }
}
