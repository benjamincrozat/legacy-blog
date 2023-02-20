<?php

namespace Tests\Feature\App\Console\Commands;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\FathomFetchCommand;

class FathomFetchCommandTest extends TestCase
{
    public function test_it_fetches_pageviews_for_each_post() : void
    {
        Http::fakeSequence()
            ->push([
                [
                    'pageviews' => 123456,
                    'pathname' => '/' . ($slug = fake()->slug()),
                ],
            ]);

        Post::factory()->create(compact('slug'));

        Artisan::call(FathomFetchCommand::class);

        $this->assertDatabaseHas(Post::class, ['views' => 123456]);
    }
}
