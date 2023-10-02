<?php

namespace App\Models;

use App\Models\Concerns\LogsActivity;
use App\Presenters\CategoryPresenter;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends BaseModel
{
    use LogsActivity;

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
            ->with('categories', 'media')
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
