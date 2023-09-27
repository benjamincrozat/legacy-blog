<?php

namespace App\Listeners;

use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Facades\App\Repositories\PostCacheRepository;

class PostDeleted implements ShouldQueue
{
    public function handle(\App\Events\PostDeleted $event) : void
    {
        cache()->forget("post_{$event->post->slug}");

        PostCacheRepository::latest();

        PostCacheRepository::popular();

        Post::query()
            ->published()
            ->whereNotIn('id', [$event->post->id])
            ->cursor()
            ->each(function (Post $post) {
                PostCacheRepository::recommendations($post->id);
            });
    }
}
