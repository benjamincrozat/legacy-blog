<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Deal extends BaseModel
{
    use HasFactory;

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    protected $with = ['affiliate'];

    public function scopeActive(Builder $query) : void
    {
        $query->where([
            ['start_at', '<=', now()],
            ['end_at', '>=', now()],
        ])->orWhere([
            ['start_at', '<=', now()],
            ['end_at', null],
        ]);
    }

    public function scopeHighlightedFirst(Builder $query) : void
    {
        $query
            ->orderByRaw(<<<SQL
CASE WHEN highlighted = 1 AND end_at IS NOT NULL THEN
    highlighted
END DESC,
CASE WHEN highlighted = 1 AND end_at IS NOT NULL THEN
    end_at
END ASC
SQL);
    }

    public function affiliate() : BelongsTo
    {
        return $this->belongsTo(Affiliate::class);
    }

    public function categories() : MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function renderedContent() : Attribute
    {
        return Attribute::make(function () {
            return Str::lightdown($this->content);
        })->shouldCache();
    }
}
