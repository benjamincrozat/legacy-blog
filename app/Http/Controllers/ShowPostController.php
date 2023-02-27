<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;

class ShowPostController extends Controller
{
    public function __invoke(Post $post) : View
    {
        return view('posts.show', [
            'post' => $post,
            'recommended' => Post::with('user')
                ->when(
                    empty($post->recommendations),
                    fn ($q) => $q->asSequence($post->recommendations),
                    function (Builder $query) use ($post) {
                        $query
                            ->inRandomOrder()
                            ->when($post->promotes_affiliate_links, fn ($q) => $q->where('promotes_affiliate_links', true))
                            ->where('ai', $post->ai)
                            ->whereNotIn('id', [$post->id]);
                    }
                )
                ->limit(10)
                ->get(),
        ]);
    }
}
