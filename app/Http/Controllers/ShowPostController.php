<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class ShowPostController extends Controller
{
    public function __invoke(Post $post) : View
    {
        return view('posts.show', [
            'highlights' => $post->affiliates()
                ->wherePivot('highlight', true)
                ->get(),
            'post' => $post,
            'recommended' => Post::with('affiliates', 'user')
                ->withRecommendations(
                    recommendations: $post->recommendations,
                    excluding: $post->id,
                    affiliates: $post->promotes_affiliate_links,
                    ai: $post->ai
                )
                ->limit(10)
                ->get(),
        ]);
    }
}
