<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;

class ShowPostController extends Controller
{
    public function __invoke(Post $post) : View
    {
        $recommendations = cache()->remember(
            "post_{$post->id}_recommendations",
            24 * 60 * 60,
            fn () => $post->recommendations,
        );

        return view('posts.show', [
            'post' => $post,
            'recommended' => Post::with('user')
                ->when(
                    ! empty($recommendations),
                    fn ($q) => $q->asSequence($recommendations),
                    function (Builder $query) use ($post) {
                        $query
                            ->inRandomOrder()
                            ->when($post->promotes_affiliate_links, fn ($q) => $q->where('promotes_affiliate_links', true))
                            ->whereNotIn('id', [$post->id]);
                    }
                )
                ->limit(10)
                ->get(),
        ]);
    }
}
