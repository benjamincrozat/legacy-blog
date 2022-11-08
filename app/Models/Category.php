<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends BaseModel
{
    use HasFactory;

    public function banners() : MorphToMany
    {
        return $this->morphedByMany(Banner::class, 'categorizable')->active();
    }

    public function posts() : MorphToMany
    {
        return $this->morphedByMany(Post::class, 'categorizable');
    }
}
