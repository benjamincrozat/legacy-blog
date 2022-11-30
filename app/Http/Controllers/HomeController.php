<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        $posts = Post::latest()->withPinned()->withUser()->get();

        $pinned = $posts->where('is_pinned')->take(4)->sortByDesc('pinned_at');

        return view('home', compact('posts', 'pinned'));
    }
}
