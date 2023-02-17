<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $pins = Pin::with('post.user')->latest()->limit(4)->get();

        $popular = Post::with('user')
            ->where('ai', false)
            ->orderByDesc('views')
            ->limit(6)
            ->get();

        $affiliates = Post::with('user')
            ->latest()
            ->where('promotes_affiliate_links', true)
            ->limit(6)
            ->get();

        $posts = Post::with('user')
            ->where('ai', false)
            ->latest()
            ->simplePaginate(perPage: 10, pageName: 'postsPage');

        $ai = Post::with('user')
            ->where('ai', true)
            ->latest()
            ->simplePaginate(perPage: 10, pageName: 'aiPostsPage');

        return view('home', compact('affiliates', 'ai', 'pins', 'popular', 'posts'));
    }
}
