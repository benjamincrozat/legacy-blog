<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Highlight extends BaseModel
{
    use HasFactory;

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
