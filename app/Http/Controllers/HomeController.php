<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        $pins = Pin::with('post.user')->latest()->limit(4)->get();

        $popular = Post::with('user')
            ->orderByDesc('views')
            ->limit(6)
            ->get();

        $posts = Post::with('user')
            ->latest()
            ->simplePaginate(perPage: 30, pageName: 'postsPage');

        return view('home', compact('pins', 'popular', 'posts'));
    }
}
