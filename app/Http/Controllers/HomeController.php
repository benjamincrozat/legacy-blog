<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        $pins = Pin::latest()->limit(4)->get();

        $popular = Post::with('user')
            ->where('ai', false)
            ->orderByDesc('views')
            ->limit(6)
            ->get();

        $posts = Post::with('user')
            ->where('ai', false)
            ->latest()
            ->simplePaginate(10);

        $ai = Post::with('user')
            ->where('ai', true)
            ->latest()
            ->simplePaginate(10);

        return view('home', compact('ai', 'pins', 'popular', 'posts'));
    }
}
