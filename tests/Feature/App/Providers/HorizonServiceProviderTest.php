<?php

use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertGuest;

test('horizon works for users', function () {
    $user = User::find(1) ?? User::factory()->create(['id' => 1]);

    actingAs($user)
        ->getJson('/horizon')
        ->assertOk();
});

test('horizon is forbidden to guests', function () {
    assertGuest()
        ->getJson('/horizon')
        ->assertForbidden();
});
