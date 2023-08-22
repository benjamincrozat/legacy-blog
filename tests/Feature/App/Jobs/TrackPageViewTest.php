<?php

use App\Jobs\TrackPageView;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

beforeEach(function () {
    config(['services.pirsch.access_key' => 'some-access-key']);

    Http::fake(['api.pirsch.io/api/v1/hit' => Http::response()]);
});

it("sends the request to Pirsch's API", function () {
    TrackPageView::dispatch(
        'https://example.com',
        'Foo',
        'Bar',
        'Baz',
        'https://www.google.com'
    );

    Http::assertSent(function (Request $request) {
        expect($request->url())
            ->toEqual('https://api.pirsch.io/api/v1/hit');

        expect($request->data()['url'])
            ->toEqual('https://example.com');

        expect($request->data()['ip'])
            ->toEqual('Foo');

        expect($request->data()['user_agent'])
            ->toEqual('Bar');

        expect($request->data()['accept_language'])
            ->toEqual('Baz');

        expect($request->data()['referrer'])
            ->toEqual('https://www.google.com');

        return true;
    });
});
