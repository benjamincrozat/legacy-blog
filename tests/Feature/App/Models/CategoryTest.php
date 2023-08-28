<?php

use App\Models\Category;
use Illuminate\Support\Facades\Bus;
use App\Jobs\CacheRenderedCategoryAttributes;

test("a category's attributes are rendered and cached after saving", function () {
    Bus::fake();

    $category = Category::factory()->create();

    Bus::assertDispatchedAfterResponse(
        CacheRenderedCategoryAttributes::class,
        fn (CacheRenderedCategoryAttributes $job) => $job->category->is($category)
    );
});
