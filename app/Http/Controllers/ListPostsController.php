<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\View\View;

class ListPostsController extends Controller
{
    public function __invoke() : View
    {
        $posts = Post::all();

        $featured = $posts->filter(fn ($p) => $p->image && $p->featured);

        return view('posts.index', [
            'featured' => $posts->filter(fn ($p) => $p->image && $p->featured)->take(4),
            'posts' => $posts,
        ]);
    }
}
