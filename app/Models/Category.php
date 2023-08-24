<?php

namespace App\Models;

use App\Models\Concerns\HasPresenter;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends BaseModel
{
    use HasPresenter;

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
