<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends BaseModel
{
    use HasFactory;

    public function scopeActive(Builder $query) : void
    {
        $query->where('start_at', '<=', now());
    }

    public function affiliate() : BelongsTo
    {
        return $this->belongsTo(Affiliate::class);
    }
}
