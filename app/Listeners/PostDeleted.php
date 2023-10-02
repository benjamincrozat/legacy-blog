<?php

namespace App\Listeners;

use App\Models\Post;
use App\Facades\Posts;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostDeleted implements ShouldQueue
{
    public function handle(\App\Events\PostDeleted $event) : void
    {
        cache()->forget("post_{$event->postSlug}");

        cache()->forget('posts_latest');

        Posts::latest();

        cache()->forget('posts_popurlar');

        Posts::popular();

        Post::query()
            ->published()
            ->whereNotIn('id', [$event->postId])
            ->cursor()
            ->each(function (Post $post) {
                cache()->forget("posts_{$post->id}_recommendations");

                Posts::recommendations($post->id);
            });
    }
}
