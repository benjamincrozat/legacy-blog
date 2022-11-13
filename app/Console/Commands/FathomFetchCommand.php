<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Fathom\Client;
use Illuminate\Console\Command;

class FathomFetchCommand extends Command
{
    protected $signature = 'fathom:fetch';

    protected $description = 'Fetch Fathom data';

    public function handle(Client $client) : int
    {
        $client
            ->views()
            ->each(function (array $item) {
                Post::where('slug', trim($item['pathname'], '/'))->update(['views' => $item['pageviews']]);
            });

        $this->info('Fathom views data fetched successfully.');

        return Command::SUCCESS;
    }
}
