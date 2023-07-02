<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertGuest;

it('works', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->getJson('/horizon')
        ->assertOk();
});

test('it disallows guests', function () {
    assertGuest()
        ->getJson('/horizon')
        ->assertForbidden();
});
