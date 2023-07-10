<?php

use App\Models\User;
use App\Models\Affiliate;
use function Pest\Laravel\get;
use function Pest\Laravel\actingAs;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use function Pest\Laravel\assertGuest;

beforeEach(function () {
    config(['services.pirsch.access_key' => 'foo']);

    Http::fake([
        'api.pirsch.io/api/v1/event' => Http::response(),
    ]);
});

it('tracks the click for guests and redirects to the affiliate', function () {
    $affiliate = Affiliate::factory()->create();

    assertGuest()
        ->from('https://example.com')
        ->get(route('affiliate', [$affiliate, 'foo' => 'bar']))
        ->assertRedirect(trim($affiliate->link, '/') . '?foo=bar');

    Http::assertSent(function (Request $request) use ($affiliate) {
        $eventMeta = [
            'id' => $affiliate->id,
            'name' => $affiliate->name,
            'link' => $affiliate->link,
        ];

        return 'https://api.pirsch.io/api/v1/event' === $request->url() &&
                'Clicked on affiliate' === $request->data()['event_name'] &&
                $request->data()['event_meta'] === $eventMeta &&
                route('affiliate', [$affiliate, 'foo' => 'bar']) === $request->data()['url'] &&
               '127.0.0.1' === $request->data()['ip'] &&
               'Symfony' === $request->data()['user_agent'] &&
               str_contains($request->data()['accept_language'], 'en-us') &&
               'https://example.com' === $request->data()['referrer'];
    });
});

it('does not track the click for users but still redirects to the affiliate', function () {
    $affiliate = Affiliate::factory()->create();

    actingAs(User::factory()->create())
        ->get(route('affiliate', $affiliate))
        ->assertRedirect();

    Http::assertNothingSent();
});

test('it throws 404 when affiliate does not exist', function () {
    get(route('affiliate', 'foo'))
        ->assertNotFound();
});
