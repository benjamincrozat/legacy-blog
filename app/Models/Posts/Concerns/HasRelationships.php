<?php

namespace App\Models\Posts\Concerns;

use App\Models\Pin;
use App\Models\User;
use App\Models\Affiliate;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRelationships
{
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function affiliates() : BelongsToMany
    {
        return $this->belongsToMany(Affiliate::class)
            ->withPivot('position', 'highlight', 'highlight_title', 'highlight_text')
            ->orderByPivot('position');
    }

    public function pins() : HasMany
    {
        return $this->hasMany(Pin::class);
    }
}
