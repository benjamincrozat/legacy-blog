<?php

use App\Models\Affiliate;
use function Pest\Laravel\get;
use function Pest\Laravel\from;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

beforeEach(function () {
    config(['services.pirsch.access_key' => 'foo']);

    Http::fake([
        'api.pirsch.io/api/v1/event' => Http::response(),
    ]);
});

it('tracks the click for guests and redirects to the affiliate', function () {
    $affiliate = Affiliate::factory()->create();

    from('https://example.com')
        ->get(route('affiliate.show', [$affiliate, 'foo' => 'bar']))
        ->assertRedirect(trim($affiliate->link, '/') . '?foo=bar');

    Http::assertSent(function (Request $request) use ($affiliate) {
        expect($request->url())->toEqual('https://api.pirsch.io/api/v1/event');
        expect($request->data()['event_name'])->toEqual('Clicked on Affiliate');
        expect($request->data()['event_meta'])->toEqual([
            'id' => "$affiliate->id",
            'name' => $affiliate->name,
            'link' => $affiliate->link,
        ]);
        expect($request->data()['url'])->toEqual(route('affiliate.show', [$affiliate, 'foo' => 'bar']));
        expect('127.0.0.1')->toEqual($request->data()['ip']);
        expect('Symfony')->toEqual($request->data()['user_agent']);
        expect(str_contains($request->data()['accept_language'], 'en-us'))->toBeTrue();
        expect('https://example.com')->toEqual($request->data()['referrer']);

        return true;
    });
});

test('it throws 404 when affiliate does not exist', function () {
    get(route('affiliate.show', 'foo'))
        ->assertNotFound();
});
