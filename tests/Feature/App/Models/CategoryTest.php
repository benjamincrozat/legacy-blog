<?php

use App\Models\Category;

test('attributes are rendered and cached after saving', function () {
    $model = Category::factory()->create();

    $firstKey = "Category.$model->id.long_description." . sha1($model->long_description);

    $secondKey = "Category.$model->id.content." . sha1($model->content);

    expect(cache()->has($firstKey))->toBeTrue();

    expect(cache()->has($secondKey))->toBeTrue();
});
