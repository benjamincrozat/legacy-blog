<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Affiliate extends BaseModel
{
    use HasFactory;

    public function posts() : BelongsToMany
    {
        return $this->belongsToMany(Post::class)->withPivot('position');
    }

    public function renderedContent() : Attribute
    {
        return Attribute::make(
            fn () => str($this->content ?? '')->marxdown()
        )->shouldCache();
    }

    public function renderedKeyFeatures() : Attribute
    {
        return Attribute::make(
            fn () => str($this->key_features ?? '')->marxdown()
        )->shouldCache();
    }

    public function renderedPros() : Attribute
    {
        return Attribute::make(
            fn () => str($this->pros ?? '')->marxdown()
        )->shouldCache();
    }

    public function renderedCons() : Attribute
    {
        return Attribute::make(
            fn () => str($this->cons ?? '')->marxdown()
        )->shouldCache();
    }
}
