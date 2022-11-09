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
                // 'date_grouping' => 'day',
                'entity_id' => config('services.fathom.site_id'),
                'entity' => 'pageview',
                'field_grouping' => 'pathname',
            ])
            ->throw()
            ->collect()
            ->each(function (array $item) {
                Post::where('slug', trim($item['pathname'], '/'))->update(['views' => $item['pageviews']]);
            });

        return Command::SUCCESS;
    }
}
