<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        $posts = Post::all();

        $featured = $posts->filter(fn ($p) => $p->image && $p->featured);

        return view('home', [
            'featured' => $posts->filter(fn ($p) => $p->image && $p->featured),
            'posts' => $posts->except($featured->keys()->all()),
        ]);
    }
}
