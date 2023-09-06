<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class PostsCacheCommand extends Command
{
    protected $signature = 'posts:cache';

    protected $description = 'Cache the attributes that need to be rendered in posts';

    public function handle() : void
    {
        Post::cursor()->each(function (Post $post) {
            dispatch(function () use ($post) {
                cache()->forget(
                    $post->presenter()->getRenderCacheKey('content', $post->content)
                );

                $post->presenter()->content();

                cache()->forget(
                    $post->presenter()->getRenderCacheKey('teaser', $post->teaser)
                );

                $post->presenter()->teaser();
            });
        });

        $this->info('Posts are being cached.');
    }
}
