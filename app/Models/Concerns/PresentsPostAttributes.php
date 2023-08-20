<?php

namespace App\Models\Concerns;

use App\Str;
use App\Tree;
use Spatie\Url\Url;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait PresentsPostAttributes
{
    public function tree() : Attribute
    {
        return Attribute::make(
            fn () : array => (new Tree)->build($this->content)
        );
    }

    public function content() : Attribute
    {
        return Attribute::make(
            fn (string $value) : string => Str::markdown($value ?? '')
        )->shouldCache();
    }

    public function teaser() : Attribute
    {
        return Attribute::make(
            fn (?string $value) : string => Str::markdown($value ?? '')
        )->shouldCache();
    }

    public function communityLinkDomain() : Attribute
    {
        return Attribute::make(
            fn (?string $value) : string => str_replace('www.', '', Url::fromString($value)->getHost())
        );
    }

    public function lastUpdate() : Attribute
    {
        return Attribute::make(
            fn () : string => ($this->updated_at ?? $this->created)->toDateTimeString()
        );
    }
}
