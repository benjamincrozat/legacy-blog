<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use App\Models\Posts\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        $pins = Pin::with('post.user')->latest()->limit(4)->get();

        $posts = Post::with('user')
            ->latest()
            ->paginate(perPage: 16);

        return view('home', compact('pins', 'posts'));
    }
}
