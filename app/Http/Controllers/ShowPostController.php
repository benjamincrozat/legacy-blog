<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class ShowPostController extends Controller
{
    public function __invoke(Post $post): View
    {
        $recommendations = cache()->remember(
            "post_{$post->id}_recommendations",
            24 * 60 * 60,
            fn () => $post->recommendations()
        );

        return view('posts.show', [
            'bestProducts' => $post->bestProducts()->with('affiliate')->get(),
            'post' => $post,
            'recommended' => Post::with('user')
                ->withRecommendations(
                    recommendations: $recommendations,
                    excluding: $post->id
                )
                ->limit(10)
                ->get(),
        ]);
    }
}
