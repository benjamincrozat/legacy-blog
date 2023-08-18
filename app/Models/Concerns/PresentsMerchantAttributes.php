<?php

namespace App\Models\Concerns;

use App\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait PresentsMerchantAttributes
{
    public function take() : Attribute
    {
        return Attribute::make(
            fn (?string $value) => $value ? Str::markdown($value ?? '') : null
        )->shouldCache();
    }

    public function keyFeatures() : Attribute
    {
        return Attribute::make(
            fn (?string $value) => $value ? Str::markdown($value ?? '') : null
        )->shouldCache();
    }

    public function content() : Attribute
    {
        return Attribute::make(
            fn (?string $value) => $value ? Str::markdown($value ?? '') : null
        )->shouldCache();
    }

    public function pros() : Attribute
    {
        return Attribute::make(
            fn (?string $value) => $value ? Str::markdown($value ?? '') : null
        )->shouldCache();
    }

    public function cons() : Attribute
    {
        return Attribute::make(
            fn (?string $value) => $value ? Str::markdown($value ?? '') : null
        )->shouldCache();
    }
}
