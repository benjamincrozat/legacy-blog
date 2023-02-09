<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FathomFetchCommand extends Command
{
    protected $signature = 'fathom:fetch';

    protected $description = 'Fetch Fathom data';

    public function handle() : int
    {
        Http::withToken(config('services.fathom.api_token'))
            ->get('https://api.usefathom.com/v1/aggregations', [
                'aggregates' => 'pageviews',
                'date_from' => now()->subWeek(),
                'entity_id' => config('services.fathom.site_id'),
                'entity' => 'pageview',
                'field_grouping' => 'pathname',
            ])
            ->throw()
            ->collect()
            ->each(
                fn ($i) => Post::where('slug', trim($i['pathname'], '/'))
                    ->update(['views' => $i['pageviews']])
            );

        $this->info('Fathom views data fetched successfully.');

        return Command::SUCCESS;
    }
}
