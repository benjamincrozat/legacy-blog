<?php

namespace App\Models;

use App\Models\Concerns\HasPresenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory, HasPresenter;

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
            ->select(['posts.id', 'posts.image', 'posts.title', 'posts.slug', 'posts.description', 'posts.community_link', 'posts.created_at', 'posts.updated_at', 'posts.manually_updated_at'])
            ->latest()
            ->published();
    }
}
