<?php

use App\Models\User;
use App\Models\Affiliate;
use function Pest\Laravel\get;
use function Pest\Laravel\actingAs;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Middleware\TrackPageView;
use function Pest\Laravel\assertGuest;
use function Pest\Laravel\withMiddleware;

beforeEach(function () {
    config(['services.pirsch.access_key' => 'foo']);

    Http::fake([
        'api.pirsch.io/api/v1/hit' => Http::response(),
    ]);

    withMiddleware(TrackPageView::class);
});

it('tracks the page view for guests', function () {
    assertGuest()
        ->from('https://example.com')
        ->get(route('home'))
        ->assertOk();

    Http::assertSent(function (Request $request) {
        return 'https://api.pirsch.io/api/v1/hit' === $request->url() &&
                route('home') === $request->data()['url'] &&
               '127.0.0.1' === $request->data()['ip'] &&
               'Symfony' === $request->data()['user_agent'] &&
               str_contains($request->data()['accept_language'], 'en-us') &&
               'https://example.com' === $request->data()['referrer'];
    });
});

it('does not track the page view for users', function () {
    actingAs(User::factory()->create())
        ->get(route('home'))
        ->assertOk();

    Http::assertNothingSent();
});

it('does not track the page view', function ($path, $requiresAuthentication) {
    if ($requiresAuthentication) {
        actingAs(User::factory()->create());
    }

    get($path);

    Http::assertNothingSent();
})->with([
    ['/horizon', true],
    ['/nova', true],
    fn () => [route('affiliate.show', Affiliate::factory()->create()), false],
]);
