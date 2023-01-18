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

        $posts = Post::with('user')
            ->whereNotIn('id', $pins->pluck('post.id'))
            ->latest()
            ->get();

        return view('home', compact('pins', 'posts'));
    }
}
