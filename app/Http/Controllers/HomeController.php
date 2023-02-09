<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        $pins = Pin::latest()->limit(4)->get()->shuffle();

        $query = Post::with('user');

        $popular = $query
            ->orderByDesc('views')
            ->limit(6)
            ->get();

        $posts = $query
            ->latest()
            ->simplePaginate(10);

        return view('home', compact('pins', 'popular', 'posts'));
    }
}
