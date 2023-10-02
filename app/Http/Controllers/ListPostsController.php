<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Facades\Posts;

class ListPostsController extends Controller
{
    public function __invoke() : View
    {
        return view('posts.index', [
            'posts' => Posts::latest(request('page', 1)),
        ]);
    }
}
