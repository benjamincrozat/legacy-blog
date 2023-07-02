<?php

use App\Models\Affiliate;
use function Pest\Laravel\get;

it('redirects to affiliate', function () {
    $affiliate = Affiliate::factory()->create();

    get(route('affiliate', [$affiliate, 'foo' => 'bar']))
        ->assertRedirect(trim($affiliate->link, '/') . '?foo=bar');
});

test('it throws 404 when affiliate does not exist', function () {
    get(route('affiliate', 'foo'))
        ->assertNotFound();
});
