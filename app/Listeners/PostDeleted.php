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

        cache()->tags(['posts'])->flush();

        Posts::latest();

        Posts::popular();

        Post::query()
            ->published()
            ->whereNotIn('id', [$event->postId])
            ->cursor()
            ->each(function (Post $post) {
                Posts::recommendations($post->id);
            });
    }
}
