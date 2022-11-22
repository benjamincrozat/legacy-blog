<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        $posts = Post::latest()->withHighlighted()->withUser()->get();

        $highlighted = $posts->where('is_highlighted')->take(4)->sortByDesc('highlighted_at');

        return view('home', compact('posts', 'highlighted'));
    }
}
