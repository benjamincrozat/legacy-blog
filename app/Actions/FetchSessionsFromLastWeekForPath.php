<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

class FetchSessionsFromLastWeekForPath
{
    public function fetch(string $path) : int
    {
        $accessToken = $this->request()
            ->post('/token', [
                'client_id' => config('services.pirsch.client_id'),
                'client_secret' => config('services.pirsch.client_secret'),
            ])
            ->throw()
            ->json('access_token');

        $startOfLastWeek = now()->startOfWeek()->subWeek();
        $endOfLastWeek = $startOfLastWeek->copy()->endOfWeek();

        $statistics = $this->request()
            ->withToken($accessToken)
            ->get('/statistics/page', [
                'id' => config('services.pirsch.domain_id'),
                'from' => $startOfLastWeek->toDateString(),
                'to' => $endOfLastWeek->toDateString(),
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
