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
}
