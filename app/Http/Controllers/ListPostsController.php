<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Highlight;
use Illuminate\View\View;

class ListPostsController extends Controller
{
    public function __invoke() : View
    {
        $posts = Post::latest()->withUser()->get();

        return view('posts.index', [
            'highlights' => Highlight::latest()->limit(4)->get(),
            'popular' => $posts->sortByDesc('views')->take(6),
            'posts' => $posts,
        ]);
    }
}
