<?php

namespace App\Observers;

use App\Models\Post;
use Facades\App\Repositories\PostCacheRepository as Posts;

class PostObserver
{
    public $afterCommit = true;

    public function saved(Post $post) : void
    {
        Posts::get($post->slug);

        Posts::latest();

        Posts::popular();

        Post::query()
            ->published()
            ->whereNotIn('id', [$post->id])->cursor()
            ->each(function (Post $post) {
                Posts::recommendations($post->id);
            });
    }

    public function deleted(Post $post) : void
    {
        cache()->forget("post_$post->slug");

        Posts::latest();

        Posts::popular();

        Post::query()
            ->published()
            ->whereNotIn('id', [$post->id])->cursor()
            ->each(function (Post $post) {
                Posts::recommendations($post->id);
            });
    }
}
