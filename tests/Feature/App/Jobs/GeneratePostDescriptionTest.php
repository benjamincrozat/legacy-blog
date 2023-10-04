<?php

use App\Models\Post;
use Illuminate\Support\Facades\Http;
use App\Jobs\GeneratePostDescription;

it('asks GPT to generate a description for a given post', function () {
    Http::fake([
        'api.openai.com/v1/chat/completions' => Http::response([
            'choices' => [['message' => ['content' => 'Lorem ipsum dolor sit amet.']]],
        ]),
    ]);

    $post = Post::factory()->create();

    GeneratePostDescription::dispatch($post);

    $this->assertEquals('Lorem ipsum dolor sit amet.', $post->fresh()->description);
});
