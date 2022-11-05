<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends BaseModel
{
    use HasFactory;

    public function affiliate() : BelongsTo
    {
        return $this->belongsTo(Affiliate::class);
    }
}
