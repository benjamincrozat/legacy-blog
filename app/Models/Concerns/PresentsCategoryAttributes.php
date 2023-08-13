<?php

namespace App\Models\Concerns;

use App\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait PresentsCategoryAttributes
{
    public function description() : Attribute
    {
        return Attribute::make(
            fn (?string $value) => Str::markdown($value ?? '')
        )->shouldCache();
    }

    public function longDescription() : Attribute
    {
        return Attribute::make(
            fn (?string $value) => Str::markdown($value ?? '')
        )->shouldCache();
    }

    public function content() : Attribute
    {
        return Attribute::make(
            fn (?string $value) => Str::markdown($value ?? '')
        )->shouldCache();
    }

    public function primaryColor() : Attribute
    {
        return Attribute::make(
            fn (?string $value) => $value ?? 'black',
        );
    }

    public function secondaryColor() : Attribute
    {
        return Attribute::make(
            fn (?string $value) => $value ?? 'white',
        );
    }
}
