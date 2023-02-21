<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class ShowPostController extends Controller
{
    public function __invoke(Post $post) : View
    {
        return view('posts.show', [
            'post' => $post,
            'recommended' => Post::with('user')
                ->withRecommendations(
                    recommendations: $post->recommendations,
                    excluding: $post->id,
                    ai: $post->ai
                )
                ->limit(10)
                ->get(),
        ]);
    }
}
