<?php

use App\Models\Post;
use App\Jobs\GeneratePostTeaser;
use Illuminate\Support\Facades\Http;

it('asks GPT to generate a teaser for a given post', function () {
    Http::fake([
        'api.openai.com/v1/*' => Http::response([
            'choices' => [['message' => ['content' => 'Lorem ipsum dolor sit amet.']]],
        ]),
    ]);

    $post = Post::factory()->published()->create();

    GeneratePostTeaser::dispatch($post);

    $this->assertEquals('Lorem ipsum dolor sit amet.', $post->fresh()->teaser);
});
