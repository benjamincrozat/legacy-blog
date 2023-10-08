<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

class AnalyticsFetchCommand extends Command
{
    protected $signature = 'analytics:fetch';

    protected $description = 'Fetch fresh data from the analytics provider';

    public function handle() : void
    {
        activity()->disableLogging();

        $this->info('Fetching analytics data…');

        Post::cursor()->each(function (Post $post) {
            $post->update([
                'sessions_last_7_days' => $this->fetch("/$post->slug", now()->subWeek()),
                'sessions_last_30_days' => $this->fetch("/$post->slug", now()->subDays(30)),
            ]);

            $this->info("Data for $post->slug has been fetched.");
        });

        $this->info('Fresh analytics data has been fetched.');
    }

    protected function fetch(string $path, Carbon $from, Carbon $to = null) : int
    {
        $accessToken = $this->request()
            ->post('/token', [
                'client_id' => config('services.pirsch.client_id'),
                'client_secret' => config('services.pirsch.client_secret'),
            ])
            ->throw()
            ->json('access_token');

        $to ??= now();

        $statistics = $this->request()
            ->withToken($accessToken)
            ->get('/statistics/page', [
                'id' => config('services.pirsch.domain_id'),
                'from' => $from->toDateString(),
                'to' => $to->toDateString(),
                'tz' => 'UTC',
                'path' => $path,
            ])
            ->throw()
            ->json();

        return optional(optional($statistics)[0])['sessions'] ?? 0;
    }

    protected function request() : PendingRequest
    {
        return Http::baseUrl('https://api.pirsch.io/api/v1');
    }
}
