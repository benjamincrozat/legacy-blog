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
            'others' => Post::whereNotIn('id', [$post->id])->inRandomOrder()->limit(10)->get(),
        ]);
    }
}
