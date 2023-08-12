<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertGuest;

test('users are logged out and redirected to the home page', function () {
    actingAs(User::factory()->create())
        ->post(route('logout'))
        ->assertRedirect(route('home'));
});

test('guests are redirected back home', function () {
    assertGuest()
        ->from(route('home'))
        ->postJson(route('logout'))
        ->assertRedirect(route('home'));
});
