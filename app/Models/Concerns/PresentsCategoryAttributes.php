<?php

namespace App\Models\Concerns;

use App\Str;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait PresentsCategoryAttributes
{
    public function description() : Attribute
    {
        return Attribute::make(
            fn (?string $value) : ?string => $value ? Str::markdown($value ?? '') : null
        )->shouldCache();
    }

    public function longDescription() : Attribute
    {
        return Attribute::make(
            fn (?string $value) : ?string => $value ? Str::markdown($value ?? '') : null
        )->shouldCache();
    }

    public function content() : Attribute
    {
        return Attribute::make(
            fn (?string $value) : ?string => $value ? Blade::render(Str::markdown($value)) : null
        );
    }

    public function primaryColor() : Attribute
    {
        return Attribute::make(
            fn (?string $value) : string => $value ?? 'black',
        );
    }

    public function secondaryColor() : Attribute
    {
        return Attribute::make(
            fn (?string $value) : string => $value ?? 'white',
        );
    }
}
