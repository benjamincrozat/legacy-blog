<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Facades\App\Repositories\PostCacheRepository;

class ListPostsController extends Controller
{
    public function __invoke() : View
    {
        return view('posts.index', [
            'posts' => PostCacheRepository::latest(request('page', 1)),
        ]);
    }
}
