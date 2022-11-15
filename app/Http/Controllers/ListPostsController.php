<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Post;
use App\Models\Highlight;
use Illuminate\View\View;

class ListPostsController extends Controller
{
    public function __invoke() : View
    {
        $highlights = Highlight::latest()->limit(4)->get();

        return view('posts.index', [
            'deals' => Deal::active()
                ->highlightedFirst()
                ->orderByDesc('created_at')
                ->limit(6)
                ->get(),
            'highlights' => $highlights,
            'posts' => Post::latest()->withUser()->whereNotIn('id', $highlights->pluck('post.id'))->get(),
        ]);
    }
}
