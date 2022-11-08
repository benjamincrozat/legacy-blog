<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use Illuminate\View\View;

class ShowPostController extends Controller
{
    public function __invoke(Post $post) : View
    {
        return view('posts.show', [
            'banners' => Banner::active()->inRandomOrder()->limit(2)->get(),
            'post' => $post,
            'others' => Post::whereNotIn('id', [$post->id])->inRandomOrder()->withUser()->get(),
        ]);
    }
}
