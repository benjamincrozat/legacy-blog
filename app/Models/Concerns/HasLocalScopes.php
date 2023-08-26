<?php

namespace App\Models\Concerns;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait HasLocalScopes
{
    /**
     * Get a sequence of posts using their IDs in the exact order provided.
     */
    public function scopeAsSequence(Builder $query, mixed $sequence) : void
    {
        $sequence = collect($sequence);

        $query
            ->whereIn('id', $sequence)
            ->orderByRaw('FIELD(id, ' . $sequence->join(',') . ')');
    }

    public function scopeWithUser(Builder $query) : void
    {
        $query
            ->addSelect([
                'user_name' => User::select('name')
                    ->whereColumn('id', 'posts.user_id')
                    ->limit(1),
            ])
            ->addSelect([
                'user_email' => User::select('email')
                    ->whereColumn('id', 'posts.user_id')
                    ->limit(1),
            ]);
    }
}
