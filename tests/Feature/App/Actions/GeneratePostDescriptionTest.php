<?php

use App\Models\Posts\Post;
use Illuminate\Support\Facades\Http;
use App\Actions\GeneratePostDescription;

it('asks GPT to generate a description for a given post', function () {
    Http::fake([
        'api.openai.com/v1/chat/completions' => Http::response([
            'choices' => [['message' => ['content' => 'Lorem ipsum dolor sit amet.']]],
        ]),
    ]);

    $post = Post::factory()->create();

    (new GeneratePostDescription)->generate($post);

    $this->assertEquals('Lorem ipsum dolor sit amet.', $post->description);
});
