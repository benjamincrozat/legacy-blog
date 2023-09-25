<?php

namespace App\Observers;

use App\Models\Post;
use Facades\App\Repositories\PostCacheRepository as Posts;

class PostObserver
{
    public $afterCommit = true;

    public function created(Post $post) : void
    {
        //
    }

    public function updated(Post $post) : void
    {
        //
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

    public function restored(Post $post) : void
    {
        //
    }

    public function forceDeleted(Post $post) : void
    {
        //
    }
}
