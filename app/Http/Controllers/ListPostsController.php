<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class ListPostsController extends Controller
{
    public function __invoke() : View
    {
        return view('posts.index', [
            'featured' => Post::latest()->featured()->limit(4)->get(),
            'posts' => Post::latest()->withUser()->get(),
        ]);
    }
}
