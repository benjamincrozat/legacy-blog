<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Post;
use Illuminate\View\View;

class ListPostsController extends Controller
{
    public function __invoke() : View
    {
        return view('posts.index', [
            'deals' => Deal::active()->highlightedFirst()->limit(6)->get(),
            'posts' => $posts = Post::latest()->withHighlighted()->withUser()->get(),
            'highlighted' => $posts->where('is_highlighted')->take(4)->sortByDesc('highlighted_at'),
        ]);
    }
}
