<?php

use App\Models\Merchant;
use App\Jobs\TrackClickOnMerchant;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

it("sends the request to Pirsch's API", function () {
    Http::fake(['api.pirsch.io/api/v1/event' => Http::response()]);

    $merchant = Merchant::factory()->create();

    TrackClickOnMerchant::dispatch(
        "$merchant->id",
        $merchant->name,
        $merchant->link,
        'https://example.com',
        'Foo',
        'Bar',
        'Baz',
        'https://www.google.com'
    );

    Http::assertSent(function (Request $request) use ($merchant) {
        expect($request->url())
            ->toEqual('https://api.pirsch.io/api/v1/event');

        expect($request->data()['event_name'])
            ->toEqual('Clicked on Merchant');

        expect($request->data()['event_meta'])
            ->toEqual([
                'id' => "$merchant->id",
                'name' => $merchant->name,
                'link' => $merchant->link,
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
