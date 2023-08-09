<?php

use App\Jobs\TrackEvent;
use App\Models\Affiliate;
use function Pest\Laravel\get;
use function Pest\Laravel\from;
use Illuminate\Support\Facades\Queue;

beforeEach(function () {
    config(['services.pirsch.access_key' => 'some-access-key']);

    Queue::fake();
});

it('tracks the click and redirects to the affiliate', function () {
    $affiliate = Affiliate::factory()->create();

    from('https://example.com')
        ->get(route('affiliate.show', [$affiliate, 'foo' => 'bar']))
        ->assertRedirect(trim($affiliate->link, '/') . '?foo=bar');

    Queue::assertPushed(TrackEvent::class);
});

test('it throws 404 when affiliate does not exist', function () {
    get(route('affiliate.show', 'foo'))
        ->assertNotFound();
});
