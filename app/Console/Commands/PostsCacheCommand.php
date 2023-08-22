<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class AnalyticsFetchCommand extends Command
{
    protected $signature = 'posts:cache';

    protected $description = 'Cache what needs to be computed in posts';

    public function handle() : void
    {
        Post::cursor()->each(function (Post $post) {
            $post->presenter()->content();
            $post->presenter()->teaser();

            $this->info("Post #$post->id has been cached.");
        });

        $this->info('Posts have all been cached.');
    }
}
