<?php

namespace App\Models;

use App\Models\Presenters\CategoryPresenter;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends BaseModel
{
    public static function booted() : void
    {
        static::saved(function (self $model) {
            $pending = dispatch(function () use ($model) {
                $model->presenter()->longDescription();
                $model->presenter()->content();
            });

            if (! app()->runningUnitTests()) {
                $pending->afterResponse();
            }
        });
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
}
