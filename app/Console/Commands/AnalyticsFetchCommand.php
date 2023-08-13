<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use App\Actions\FetchSessionsForPath;

class AnalyticsFetchCommand extends Command
{
    protected $signature = 'analytics:fetch';

    protected $description = 'Fetch fresh data from the analytics provider';

    public function handle() : void
    {
        Post::cursor()->each(function (Post $post) {
            $post->update([
                'sessions' => (new FetchSessionsForPath)->fetch("/$post->slug"),
            ]);
        });

        $this->info('Fresh analytics data has been fetched.');
    }
}
