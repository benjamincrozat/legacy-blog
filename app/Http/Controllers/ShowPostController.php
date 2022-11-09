<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;

class ShowPostController extends Controller
{
    public function __invoke(Post $post) : View
    {
        $deals = $post->categories->map(function (Category $category) {
            return $category->deals;
        })->flatten()->shuffle();

        return view('posts.show', [
            'deals' => $deals->isNotEmpty() ? $deals : Deal::active()->inRandomOrder()->take(2)->get(),
            'post' => $post,
            'others' => Post::whereNotIn('id', [$post->id])->inRandomOrder()->withUser()->get(),
        ]);
    }
}
