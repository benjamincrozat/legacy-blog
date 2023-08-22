<?php

namespace App\Models\Concerns;

use App\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait RendersAttributes
{
    public function renderAttributeAsMarkdown(string $attribute) : Attribute
    {
        return Attribute::make(function (?string $value) use ($attribute) {
            return cache()->rememberForever(
                $this->getAttributeRenderCacheKey($attribute, $value),
                fn () => Str::markdown($value ?? '')
            );
        })->shouldCache();
    }

    public function getAttributeRenderCacheKey(string $attribute, ?string $value) : string
    {
        return sprintf('%s.%s.%s.%s', class_basename($this::class), $this->id, $attribute, sha1($value ?? ''));
    }
}
