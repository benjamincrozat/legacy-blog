<?php

use App\Models\Post;
use Illuminate\Support\Facades\Bus;
use App\Jobs\CacheRenderedPostAttributes;

test("a post's attributes are rendered and cached after saving", function () {
    Bus::fake()->serializeAndRestore();

    $post = Post::factory()->create();

    Bus::assertDispatchedAfterResponse(
        CacheRenderedPostAttributes::class,
        fn (CacheRenderedPostAttributes $job) => $job->post->is($post)
    );
});
