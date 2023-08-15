<?php

use App\Models\User;
use App\Models\Affiliate;
use function Pest\Laravel\get;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\postJson;
use Illuminate\Support\Facades\Queue;
use App\Http\Middleware\TrackPageView;
use function Pest\Laravel\withMiddleware;

beforeEach(function () {
    config(['services.pirsch.access_key' => 'some-access-key']);

    Queue::fake();

    withMiddleware(TrackPageView::class);
});

it('tracks page views', function () {
    get(route('home'))->assertOk();

    Queue::assertPushed(\App\Jobs\TrackPageView::class);
});

it('does not track the page view for excluded paths', function ($path, $requiresAuthentication) {
    if ($requiresAuthentication) {
        actingAs(User::factory()->create());
    }

    get($path);

    Queue::assertNotPushed(\App\Jobs\TrackPageView::class);
})->with([
    ['/horizon', true],
    ['/nova', true],
    fn () => [route('affiliate.show', Affiliate::factory()->create()), false],
]);

it('does not track page views for HTTP methods other than GET', function () {
    postJson(route('subscribe'));

    Queue::assertNotPushed(\App\Jobs\TrackPageView::class);
});
