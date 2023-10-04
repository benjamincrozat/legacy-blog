<?php

namespace App\Models\Concerns;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

trait HasLocalScopes
{
    /**
     * Get a sequence of posts using their IDs in the exact order provided.
     */
    public function scopeAsSequence(Builder $query, Collection|array $sequence) : void
    {
        $sequence = collect($sequence);

        $query
            ->whereIn('id', $sequence)
            ->orderByRaw('FIELD(id, ' . $sequence->join(',') . ')');
    }

    public function scopePublished(Builder $query) : void
    {
        $query->where('published_at', '<=', now());
    }

    public function scopeUnpublished(Builder $query) : void
    {
        $query->whereNull('published_at')->orWhere('published_at', '>', now());
    }
}
