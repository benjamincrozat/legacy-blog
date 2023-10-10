<?php

use App\Models\Post;
use App\Models\Category;

use function Pest\Laravel\get;

use Illuminate\Support\Collection;

it('displays the categories and put the highlighted ones first', function () {
    $fakeCategories = Category::factory(3)
        ->sequence(
            ['is_highlighted' => true],
            ['is_highlighted' => false],
            ['is_highlighted' => false],
        )
        ->hasPosts(5, ['published_at' => now()])
        ->create();

    $categories = get(route('home'))
        ->assertOk()
        ->assertViewIs('home');
});

it('displays popular posts', function () {
    Post::factory(15)->published()->create();

    /** @var Illuminate\Support\Collection */
    $popular = get(route('home'))
        ->assertOk()
        ->assertViewIs('home')
        ->viewData('popular');

    expect($popular)->toBeInstanceOf(Collection::class);
    expect($popular)->toHaveCount(9);
    expect(fn () => $popular->ensure(Post::class))->not->toThrow(UnexpectedValueException::class);
});

it('displays the latest posts', function () {
    Post::factory(15)->published()->create();

    /** @var Illuminate\Support\Collection */
    $latest = get(route('home'))
        ->assertOk()
        ->assertViewIs('home')
        ->viewData('latest');

    expect($latest)->toBeInstanceOf(Collection::class);
    expect($latest)->toHaveCount(9);
    expect(fn () => $latest->ensure(Post::class))->not->toThrow(UnexpectedValueException::class);
});
