<?php

use App\Models\Post;
use App\Jobs\CacheRenderedPostAttributes;

test("a given post's attributes are rendered and cached", function () {
    CacheRenderedPostAttributes::dispatch(
        $post = Post::factory()->create()
    );

    $firstKey = "Post.$post->id.content." . sha1($post->content);

    $secondKey = "Post.$post->id.teaser." . sha1($post->teaser);

    expect(cache()->has($firstKey))->toBeTrue();

    expect(cache()->has($secondKey))->toBeTrue();
});
