<?php

namespace App\Console\Commands;

use App\Models\Posts\Post;
use Illuminate\Console\Command;
use App\Actions\FetchSessionsFromLastWeekForPath;

class AnalyticsFetchCommand extends Command
{
    protected $signature = 'analytics:fetch';

    protected $description = 'Fetch fresh data from the analytics provider';

    public function handle() : void
    {
        Post::cursor()->each(function (Post $post) {
            $post->update([
                'sessions' => (new FetchSessionsFromLastWeekForPath)->fetch("/$post->slug"),
            ]);
        });

        $this->info('Fresh analytics data has been fetched.');
    }
}
