<?php

use App\Models\User;

it('does not display the admin menu to guests', function () {
    $this
        ->assertView('components.navigation')
        ->doesNotContain('Admin');
});

it('displays the admin menu to users', function () {
    $this
        ->actingAs(User::factory()->create())
        ->assertView('components.navigation')
        ->contains('Admin');
});
