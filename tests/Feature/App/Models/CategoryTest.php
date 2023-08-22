<?php

use App\Str;
use App\Models\Category;

test('attributes are rendered as markdown and cached when accessed for the first time', function (string $attribute) {
    $category = Category::factory()->create();

    $key = "Category.$category->id.$attribute." . sha1($category->$attribute);

    expect(cache()->has($key))->toBeFalse();

    $camelAttribute = Str::camel($attribute);

    $category->presenter()->$camelAttribute();

    expect(cache()->has($key))->toBeTrue();
})->with([
    ['long_description'],
    ['content'],
]);
