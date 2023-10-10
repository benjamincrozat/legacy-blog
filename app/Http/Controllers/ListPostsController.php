<?php

namespace App\Http\Controllers;

use App\Facades\Posts;
use Illuminate\View\View;

class ListPostsController extends Controller
{
    public function __invoke() : View
    {
        return view('posts.index', [
            'posts' => Posts::latest(request('page', 1)),
        ]);
    }
}
