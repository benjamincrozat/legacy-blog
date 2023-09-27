<?php

use App\Models\Post;
use App\Models\User;
use App\Events\PostSaved;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

use Illuminate\Support\Facades\Event;

use function Pest\Laravel\assertGuest;

use App\Filament\Resources\PostResource;

beforeEach(function () {
    Event::fake([PostSaved::class]);
});

it('lets users list posts', function () {
    actingAs(User::factory()->create())
        ->get(PostResource::getUrl('index'))
        ->assertOk();
});

test('the posts listing component works', function () {
    $posts = Post::factory(3)->published()->create();

    livewire(PostResource\Pages\ListPosts::class)
        ->assertCanSeeTableRecords($posts);
});

it('does not let guests list posts', function () {
    assertGuest()
        ->getJson(PostResource::getUrl('index'))
        ->assertUnauthorized();
});

it('lets users create posts', function () {
    actingAs(User::factory()->create())
        ->get(PostResource::getUrl('create'))
        ->assertOk();
});

test('the posts creation component works', function () {
    $user = User::factory()->create();

    livewire(PostResource\Pages\CreatePost::class)
        ->fillForm($attributes = [
            'user_id' => $user->id,
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'content' => fake()->sentence(),
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Post::class, $attributes);
});

it('does not let guests create posts', function () {
    assertGuest()
        ->getJson(PostResource::getUrl('create'))
        ->assertUnauthorized();
});

it('lets users edit posts', function () {
    $post = Post::factory()->create();

    actingAs(User::factory()->create())
        ->get(PostResource::getUrl('edit', [
            'record' => $post,
        ]))
        ->assertOk();
});

test('the posts edit component works', function () {
    $post = Post::factory()->published()->create();

    livewire(PostResource\Pages\EditPost::class, [
        'record' => $post->getRouteKey(),
    ])
        ->assertFormSet([
            'user_id' => $post->user->id,
            'title' => $post->title,
            'slug' => $post->slug,
            'content' => $post->content,
        ]);
});

it('does not let guests edit posts', function () {
    $post = Post::factory()->create();

    assertGuest()
        ->getJson(PostResource::getUrl('edit', [
            'record' => $post,
        ]))
        ->assertUnauthorized();
});
