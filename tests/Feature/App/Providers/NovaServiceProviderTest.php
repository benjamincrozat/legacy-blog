<?php

use App\Models\User;
use function Pest\Laravel\getJson;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertGuest;

it('works', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->getJson('/nova')
        ->assertRedirect('/nova/resources/posts');
});

test('it disallows guests', function () {
    assertGuest();

    getJson('/nova')
        ->assertUnauthorized();
});
