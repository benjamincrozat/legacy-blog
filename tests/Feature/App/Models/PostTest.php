<?php

use App\Models\Post;

test('attributes are rendered and cached after saving', function () {
    $model = Post::factory()->create();

    $firstKey = "Post.$model->id.content." . sha1($model->content);

    $secondKey = "Post.$model->id.teaser." . sha1($model->teaser);

    expect(cache()->has($firstKey))->toBeTrue();

    expect(cache()->has($secondKey))->toBeTrue();
});
