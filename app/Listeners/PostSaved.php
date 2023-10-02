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

        cache()->tags(['posts'])->flush();

        Posts::get($event->post->slug);

        Posts::latest();

        Posts::popular();

        Post::query()
            ->published()
            ->whereNotIn('id', [$event->post->id])
            ->cursor()
            ->each(function (Post $post) {
                Posts::recommendations($post->id);
            });
    }
}
