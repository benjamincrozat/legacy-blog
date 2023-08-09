<?php

use App\Jobs\TrackEvent;
use App\Models\Affiliate;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

it("sends the request to Pirsch's API", function () {
    Http::fake(['api.pirsch.io/api/v1/event' => Http::response()]);

    $affiliate = Affiliate::factory()->create();

    TrackEvent::dispatch(
        "$affiliate->id",
        $affiliate->name,
        $affiliate->link,
        'https://example.com',
        'Foo',
        'Bar',
        'Baz',
        'https://www.google.com'
    );

    Http::assertSent(function (Request $request) use ($affiliate) {
        expect($request->url())
            ->toEqual('https://api.pirsch.io/api/v1/event');

        expect($request->data()['event_name'])
            ->toEqual('Clicked on Affiliate');

        expect($request->data()['event_meta'])
            ->toEqual([
                'id' => "$affiliate->id",
                'name' => $affiliate->name,
                'link' => $affiliate->link,
            ]);

        expect($request->data()['url'])
            ->toEqual('https://example.com');

        expect($request->data()['ip'])
            ->toEqual('Foo');

        expect($request->data()['user_agent'])
            ->toEqual('Bar');

        expect(str_contains($request->data()['accept_language'], 'Baz'))
            ->toBeTrue();

        expect($request->data()['referrer'])
            ->toEqual('https://www.google.com');

        return true;
    });
});
