<?php

use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;
use function Pest\Laravel\assertGuest;

use App\Filament\Resources\UserResource;

it('lets users list users', function () {
    actingAs(User::factory()->create())
        ->get(UserResource::getUrl('index'))
        ->assertOk();
});

test('the users listing component works', function () {
    $users = User::factory(3)->create();

    livewire(UserResource\Pages\ListUsers::class)
        ->assertCanSeeTableRecords($users);
});

it('does not let guests list users', function () {
    assertGuest()
        ->getJson(UserResource::getUrl('index'))
        ->assertUnauthorized();
});

it('lets users create users', function () {
    actingAs(User::factory()->create())
        ->get(UserResource::getUrl('create'))
        ->assertOk();
});

test('the users creation component works', function () {
    $user = User::factory()->create();

    livewire(UserResource\Pages\CreateUser::class)
        ->fillForm($attributes = [
            'name' => fake()->name(),
            'description' => fake()->paragraph(),
            'github_handle' => fake()->userName(),
            'x_handle' => fake()->userName(),
            'email' => fake()->safeEmail(),
            'password' => 'password',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    // Make sure the password is not stored in plain text.
    $this->assertDatabaseMissing(User::class, [
        'password' => $attributes['password'],
    ]);

    unset($attributes['password']);

    $this->assertDatabaseHas(User::class, $attributes);
});

it('does not let guests create users', function () {
    assertGuest()
        ->getJson(UserResource::getUrl('create'))
        ->assertUnauthorized();
});

it('lets users edit users', function () {
    $user = User::factory()->create();

    actingAs(User::factory()->create())
        ->get(UserResource::getUrl('edit', [
            'record' => $user,
        ]))
        ->assertOk();
});

test('the users edit component works', function () {
    $user = User::factory()->create();

    livewire(UserResource\Pages\EditUser::class, [
        'record' => $user->getRouteKey(),
    ])
        ->assertFormSet([
            'name' => $user->name,
            'description' => $user->description,
            'github_handle' => $user->github_handle,
            'x_handle' => $user->x_handle,
            'email' => $user->email,
        ]);
});

it('does not let guests edit users', function () {
    $user = User::factory()->create();

    assertGuest()
        ->getJson(UserResource::getUrl('edit', [
            'record' => $user,
        ]))
        ->assertUnauthorized();
});
