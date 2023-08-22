<?php

use App\Str;
use App\Models\Post;

test('attributes are rendered as markdown and cached when accessed for the first time', function (string $attribute) {
    $post = Post::factory()->create();

    $key = "Post.$post->id.$attribute." . sha1($post->$attribute);

    expect(cache()->has($key))->toBeFalse();

    $camelAttribute = Str::camel($attribute);

    $post->presenter()->$camelAttribute();

    expect(cache()->has($key))->toBeTrue();
})->with([
    ['content'],
    ['teaser'],
]);
