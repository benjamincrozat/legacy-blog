<?php

use Illuminate\Support\Facades\Http;
use App\Actions\FetchSessionsForPath;

test('commands fetches sessions from last week for a given path', function () {
    Http::fake([
        'api.pirsch.io/api/v1/token*' => Http::response(['access_token' => 'foo']),
        'api.pirsch.io/api/v1/statistics/page*' => Http::response([['sessions' => 123]]),
    ]);

    $sessions = (new FetchSessionsForPath)->fetch('/foo');

    $this->assertEquals(123, $sessions);
});
