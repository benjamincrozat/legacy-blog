<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends BaseModel
{
    use HasFactory;

    public function renderedDescription() : Attribute
    {
        return Attribute::make(
            fn () => Str::marxdown($this->description ?? '')
        )->shouldCache();
    }

    public function deals() : MorphToMany
    {
        return $this->morphedByMany(Deal::class, 'categorizable')->active()->highlightedFirst();
    }

    public function posts() : MorphToMany
    {
        return $this->morphedByMany(Post::class, 'categorizable');
    }
}
