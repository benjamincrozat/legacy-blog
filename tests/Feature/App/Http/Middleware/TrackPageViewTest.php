<?php

use App\Models\User;
use App\Models\Merchant;

use function Pest\Laravel\get;
use function Pest\Laravel\actingAs;

use Illuminate\Support\Facades\Queue;
use App\Http\Middleware\TrackPageView;

use function Pest\Laravel\withMiddleware;

beforeEach(function () {
    config(['services.pirsch.access_key' => 'some-access-key']);

    Queue::fake()->serializeAndRestore();

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
    ['/admin', true],
    ['/horizon', true],
    fn () => [route('merchants.show', Merchant::factory()->create()), false],
]);

it('does not track the page view for non-existing posts', function () {
    get('/foo');

    Queue::assertNotPushed(\App\Jobs\TrackPageView::class);
});

it('does not track page views for user #1', function () {
    actingAs(User::factory()->create(['id' => 1]));

    get(route('home'));

    Queue::assertNotPushed(\App\Jobs\TrackPageView::class);
});
