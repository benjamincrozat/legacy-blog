<?php

use App\Models\Category;
use App\Jobs\CacheRenderedCategoryAttributes;

test("a given category's attributes are rendered and cached", function () {
    CacheRenderedCategoryAttributes::dispatch(
        $category = Category::factory()->create()
    );

    $firstKey = "Category.$category->id.long_description." . sha1($category->long_description);

    $secondKey = "Category.$category->id.content." . sha1($category->content);

    expect(cache()->has($firstKey))->toBeTrue();

    expect(cache()->has($secondKey))->toBeTrue();
});
