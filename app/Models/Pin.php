<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pin extends BaseModel
{
    use HasFactory;

    protected $with = ['post'];

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
