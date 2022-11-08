<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\View\View;

class ShowPostController extends Controller
{
    public function __invoke(Post $post) : View
    {
        $banners = $post->categories->map(function (Category $category) {
            return $category->banners;
        })->flatten()->shuffle();

        return view('posts.show', [
            'banners' => $banners->isNotEmpty() ? $banners : Banner::active()->inRandomOrder()->take(2)->get(),
            'post' => $post,
            'others' => Post::whereNotIn('id', [$post->id])->inRandomOrder()->withUser()->get(),
        ]);
    }
}
