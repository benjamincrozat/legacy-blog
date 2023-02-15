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
                    recommendations: $post->recommendations(),
                    excluding: $post->id
                )
                ->limit(10)
                ->get(),
        ]);
    }
}
