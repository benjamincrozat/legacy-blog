<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\PresentsCategoryAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory, PresentsCategoryAttributes;

    public function posts() : BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function latest() : BelongsToMany
    {
        return $this
            ->posts()
            ->select(['posts.id', 'posts.image', 'posts.title', 'posts.slug', 'posts.description', 'posts.created_at', 'posts.updated_at'])
            ->latest();
    }
}
