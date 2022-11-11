<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Highlight;
use Illuminate\View\View;

class ListPostsController extends Controller
{
    public function __invoke() : View
    {
        return view('posts.index', [
            'highlights' => Highlight::latest()->limit(4)->get(),
            'posts' => Post::latest()->withUser()->get(),
        ]);
    }
}
