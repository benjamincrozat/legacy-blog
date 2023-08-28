<?php

namespace App\Models;

use App\Models\Presenters\CategoryPresenter;
use App\Jobs\CacheRenderedCategoryAttributes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends BaseModel
{
    public static function booted() : void
    {
        static::saved(
            fn (self $model) => CacheRenderedCategoryAttributes::dispatchAfterResponse($model)
        );
    }

    public function presenter() : CategoryPresenter
    {
        return new CategoryPresenter($this);
    }

    public function posts() : BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function latestPosts() : BelongsToMany
    {
        return $this
            ->posts()
            ->latest()
            ->published();
    }

    public function related() : BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_category', 'category_id', 'related_category_id');
    }

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_category', 'related_category_id', 'category_id');
    }
}
