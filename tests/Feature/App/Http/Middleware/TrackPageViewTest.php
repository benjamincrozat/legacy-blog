<?php

use App\Models\User;
use App\Models\Merchant;

use function Pest\Laravel\get;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\postJson;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Middleware\TrackPageView;

use function Pest\Laravel\withMiddleware;

beforeEach(function () {
    config(['services.pirsch.access_key' => 'some-access-key']);

    Http::fake(['api.pirsch.io/api/v1/hit' => Http::response()]);

    withMiddleware(TrackPageView::class);
});

it('tracks page views', function () {
    get(route('home'))->assertOk();

    Http::assertSent(function (Request $request) {
        expect($request->url())
            ->toEqual('https://api.pirsch.io/api/v1/hit');

        expect($request->data()['url'])
            ->toEqual(config('app.url'));

        expect($request->data()['ip'])
            ->toEqual('127.0.0.1');

        expect($request->data()['user_agent'])
            ->toEqual('Symfony');

        expect($request->data()['accept_language'])
            ->toEqual('en-us,en;q=0.5');

        expect($request->data()['referrer'])
            ->toEqual(null);

        return true;
    });
});

it('does not track the page view for excluded paths', function ($path, $requiresAuthentication) {
    if ($requiresAuthentication) {
        actingAs(User::factory()->create());
    }

    get($path);

    Http::assertNothingSent();
})->with([
    ['/admin', true],
    ['/horizon', true],
    fn () => [route('merchants.show', Merchant::factory()->create()), false],
]);

it('does not track page views for HTTP methods other than GET', function () {
    postJson(route('subscribe'));

    Http::assertNothingSent();
});

it('does not track page views for user #1', function () {
    actingAs(User::factory()->create(['id' => 1]));

    get(route('home'));

    Http::assertNothingSent();
});
