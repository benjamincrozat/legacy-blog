<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use App\Actions\FetchSessionsForPath;

test('command fetches sessions from the last 7 days for a given path', function () {
    Http::fake([
        'api.pirsch.io/api/v1/token*' => Http::response(['access_token' => 'foo']),
        'api.pirsch.io/api/v1/statistics/page*' => Http::response([['sessions' => 123]]),
    ]);

    $sessions = (new FetchSessionsForPath)->fetch('/foo');

    $this->assertEquals(123, $sessions);

    Http::assertSent(function (Request $request) {
        if ('GET' === $request->method()) {
            expect($request->data()['from'])->toEqual(now()->subWeek()->toDateString());
            expect($request->data()['to'])->toEqual(now()->toDateString());
        }

        return true;
    });
});
