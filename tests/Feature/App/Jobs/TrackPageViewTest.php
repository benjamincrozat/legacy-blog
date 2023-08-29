<?php

use App\Jobs\TrackPageView;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

it('tracks page views', function () {
    config(['services.pirsch.access_key' => 'some-access-key']);

    Http::fake(['api.pirsch.io/api/v1/hit' => Http::response()]);

    dispatch(
        $job = new TrackPageView(
            url: fake()->url(),
            ip: fake()->ipv4(),
            userAgent: fake()->userAgent(),
            acceptLanguage: 'en-us,en;q=0.5',
            referrer: fake()->url(),
        )
    );

    Http::assertSent(function (Request $request) use ($job) {
        expect($request->url())
            ->toEqual('https://api.pirsch.io/api/v1/hit');

        expect($request->data()['url'])
            ->toEqual($job->url);

        expect($request->data()['ip'])
            ->toEqual($job->ip);

        expect($request->data()['user_agent'])
            ->toEqual($job->userAgent);

        expect($request->data()['accept_language'])
            ->toEqual($job->acceptLanguage);

        expect($request->data()['referrer'])
            ->toEqual($job->referrer);

        return true;
    });
});
