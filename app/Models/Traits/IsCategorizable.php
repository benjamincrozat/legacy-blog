<?php

namespace App\Models\Traits;

use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait IsCategorizable
{
    public function categories() : MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}
