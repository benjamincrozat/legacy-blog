<?php

namespace App\Listeners;

use App\Models\Post;
use App\Facades\Posts;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostSaved implements ShouldQueue
{
    public function handle(\App\Events\PostSaved $event) : void
    {
        cache()->forget("post_{$event->post->slug}");

        Posts::get($event->post->slug);

        cache()->forget('posts_latest');

        Posts::latest();

        cache()->forget('posts_popular');

        Posts::popular();

        Post::query()
            ->published()
            ->whereNotIn('id', [$event->post->id])
            ->cursor()
            ->each(function (Post $post) {
                cache()->forget("posts_{$post->id}_recommendations");

                Posts::recommendations($post->id);
            });
    }
}
