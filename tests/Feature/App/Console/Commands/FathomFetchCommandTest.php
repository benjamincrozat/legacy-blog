<?php

use App\Models\Post;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\FathomFetchCommand;
use function Pest\Laravel\assertDatabaseHas;

it('fetches pageviews for each post', function () {
    Http::fakeSequence()
        ->push([[
            'pageviews' => 123456,
            'pathname' => '/' . ($slug = fake()->slug()),
        ]]);

    Post::factory()->create(compact('slug'));

    Artisan::call(FathomFetchCommand::class);

    assertDatabaseHas(Post::class, ['views' => 123456]);
});
