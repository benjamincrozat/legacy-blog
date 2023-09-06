<?php

use App\Models\User;
use App\Models\Category;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;
use function Pest\Laravel\assertGuest;

use App\Filament\Resources\CategoryResource;

it('lets users list categories', function () {
    actingAs(User::factory()->create())
        ->get(CategoryResource::getUrl('index'))
        ->assertOk();
});

test('the categories listing component works', function () {
    $categories = Category::factory(3)->create();

    livewire(CategoryResource\Pages\ListCategories::class)
        ->assertCanSeeTableRecords($categories);
});

it('does not let guests list categories', function () {
    assertGuest()
        ->getJson(CategoryResource::getUrl('index'))
        ->assertUnauthorized();
});

it('lets users create categories', function () {
    actingAs(User::factory()->create())
        ->get(CategoryResource::getUrl('create'))
        ->assertOk();
});

test('the categories creation component works', function () {
    $user = User::factory()->create();

    livewire(CategoryResource\Pages\CreateCategory::class)
        ->fillForm($attributes = [
            'name' => fake()->word(),
            'slug' => fake()->slug(),
            'long_description' => fake()->paragraph(),
            'content' => fake()->paragraphs(3, true),
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Category::class, $attributes);
});

it('does not let guests create categories', function () {
    assertGuest()
        ->getJson(CategoryResource::getUrl('create'))
        ->assertUnauthorized();
});

it('lets users edit categories', function () {
    $category = Category::factory()->create();

    actingAs(User::factory()->create())
        ->get(CategoryResource::getUrl('edit', [
            'record' => $category,
        ]))
        ->assertOk();
});

test('the categories edit component works', function () {
    $category = Category::factory()->create();

    livewire(CategoryResource\Pages\EditCategory::class, [
        'record' => $category->getRouteKey(),
    ])
        ->assertFormSet([
            'name' => $category->name,
            'slug' => $category->slug,
            'long_description' => $category->long_description,
            'content' => $category->content,
        ]);
});

it('does not let guests edit categories', function () {
    $category = Category::factory()->create();

    assertGuest()
        ->getJson(CategoryResource::getUrl('edit', [
            'record' => $category,
        ]))
        ->assertUnauthorized();
});
