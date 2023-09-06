<?php

use App\Models\User;
use App\Models\Merchant;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;
use function Pest\Laravel\assertGuest;

use App\Filament\Resources\MerchantResource;

it('lets users list merchants', function () {
    actingAs(User::factory()->create())
        ->get(MerchantResource::getUrl('index'))
        ->assertOk();
});

test('the merchants listing component works', function () {
    $merchants = Merchant::factory(3)->create();

    livewire(MerchantResource\Pages\ListMerchants::class)
        ->assertCanSeeTableRecords($merchants);
});

it('does not let guests list merchants', function () {
    assertGuest()
        ->getJson(MerchantResource::getUrl('index'))
        ->assertUnauthorized();
});

it('lets users create merchants', function () {
    actingAs(User::factory()->create())
        ->get(MerchantResource::getUrl('create'))
        ->assertOk();
});

test('the merchants creation component works', function () {
    $user = User::factory()->create();

    livewire(MerchantResource\Pages\CreateMerchant::class)
        ->fillForm($attributes = [
            'name' => fake()->word(),
            'slug' => fake()->slug(),
            'link' => fake()->url(),
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Merchant::class, $attributes);
});

it('does not let guests create merchants', function () {
    assertGuest()
        ->getJson(MerchantResource::getUrl('create'))
        ->assertUnauthorized();
});

it('lets users edit merchants', function () {
    $post = Merchant::factory()->create();

    actingAs(User::factory()->create())
        ->get(MerchantResource::getUrl('edit', [
            'record' => $post,
        ]))
        ->assertOk();
});

test('the merchants edit component works', function () {
    $post = Merchant::factory()->create();

    livewire(MerchantResource\Pages\EditMerchant::class, [
        'record' => $post->getRouteKey(),
    ])
        ->assertFormSet([
            'name' => $post->name,
            'slug' => $post->slug,
            'link' => $post->link,
        ]);
});

it('does not let guests edit merchants', function () {
    $post = Merchant::factory()->create();

    assertGuest()
        ->getJson(MerchantResource::getUrl('edit', [
            'record' => $post,
        ]))
        ->assertUnauthorized();
});
