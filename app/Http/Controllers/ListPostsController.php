<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Facades\App\Repositories\PostCacheRepository as Posts;

class ListPostsController extends Controller
{
    public function __invoke() : View
    {
        return view('posts.index', [
            'posts' => Posts::latest(request('page', 1)),
        ]);
    }
}
