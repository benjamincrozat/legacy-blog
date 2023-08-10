<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use Illuminate\View\View;
use App\Models\Posts\Post;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        $pins = Pin::with('post.user')->latest()->limit(4)->get();

        $popular = Post::with('user')
            ->where('is_community_link', false)
            ->where('sessions', '>', 0)
            ->orderByDesc('sessions')
            ->limit(6)
            ->get();

        $community = Post::with('user')
            ->where('is_community_link', true)
            ->latest()
            ->limit(10)
            ->get();

        $posts = Post::with('user')
            ->where('is_community_link', false)
            ->latest()
            ->paginate(perPage: 16);

        return view('home', compact('pins', 'popular', 'community', 'posts'));
    }
}
