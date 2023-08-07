<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertGuest;

test('nova works for users', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->getJson('/nova')
        ->assertRedirect('/nova/resources/posts');
});

test('nova is forbidden to guests', function () {
    assertGuest()
        ->getJson('/nova')
        ->assertUnauthorized();
});
