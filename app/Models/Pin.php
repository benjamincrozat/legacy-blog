<?php

namespace App\Models;

use App\Models\Posts\Post;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pin extends BaseModel
{
    protected $with = ['post'];

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
