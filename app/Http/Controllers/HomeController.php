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
            ->whereNull('community_link')
            ->where('sessions', '>', 0)
            ->orderByDesc('sessions')
            ->limit(6)
            ->get();

        $community = Post::with('user')
            ->whereNotNull('community_link')
            ->latest()
            ->limit(10)
            ->get();

        $posts = Post::with('user')
            ->whereNull('community_link')
            ->latest()
            ->paginate(perPage: 16);

        return view('home', compact('pins', 'popular', 'community', 'posts'));
    }
}
