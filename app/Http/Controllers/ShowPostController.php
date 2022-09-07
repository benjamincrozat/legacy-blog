<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\View\View;

class ShowPostController extends Controller
{
    public function __invoke(string $slug) : View
    {
        return view('posts.show', [
            'post' => Post::get($slug),
            'others' => Post::all()->filter(fn ($p) => $p->slug !== $slug)->shuffle()->take(6),
        ]);
    }
}
