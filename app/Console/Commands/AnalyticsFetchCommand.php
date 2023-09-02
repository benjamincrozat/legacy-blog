<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

class AnalyticsFetchCommand extends Command
{
    protected $signature = 'analytics:fetch';

    protected $description = 'Fetch fresh data from the analytics provider';

    public function handle() : void
    {
        Post::cursor()->each(function (Post $post) {
            $post->update([
                'sessions' => $this->fetch("/$post->slug"),
            ]);
        });

        $this->info('Fresh analytics data has been fetched.');
    }

    protected function fetch(string $path) : int
    {
        $accessToken = $this->request()
            ->post('/token', [
                'client_id' => config('services.pirsch.client_id'),
                'client_secret' => config('services.pirsch.client_secret'),
            ])
            ->throw()
            ->json('access_token');

        $statistics = $this->request()
            ->withToken($accessToken)
            ->get('/statistics/page', [
                'id' => config('services.pirsch.domain_id'),
                'from' => now()->subWeek()->toDateString(),
                'to' => now()->toDateString(),
                'tz' => 'UTC',
                'path' => $path,
            ])
            ->throw()
            ->json();

        return $statistics[0]['sessions'];
    }

    protected function request() : PendingRequest
    {
        return Http::baseUrl('https://api.pirsch.io/api/v1');
    }
}
