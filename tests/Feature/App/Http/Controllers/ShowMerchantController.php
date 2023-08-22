<?php

use App\Models\Merchant;

use function Pest\Laravel\get;
use function Pest\Laravel\from;

use App\Jobs\TrackClickOnMerchant;
use Illuminate\Support\Facades\Queue;

beforeEach(function () {
    config(['services.pirsch.access_key' => 'some-access-key']);

    Queue::fake(TrackClickOnMerchant::class);
});

it('tracks the click and redirects to the merchant', function () {
    $merchant = Merchant::factory()->create();

    from('https://example.com')
        ->get(route('merchants.show', [$merchant, 'foo' => 'bar']))
        ->assertRedirect(trim($merchant->link, '/') . '?foo=bar');

    Queue::assertPushed(TrackClickOnMerchant::class);
});

test('it throws 404 when merchant does not exist', function () {
    get(route('merchants.show', 'foo'))
        ->assertNotFound();
});
