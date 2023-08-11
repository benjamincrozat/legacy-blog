<?php

namespace App\Models\Posts\Concerns;

use Spatie\Url\Url;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait PresentsAttributes
{
    public function renderedIntroduction() : Attribute
    {
        return Attribute::make(
            fn () => str($this->introduction ?? '')->marxdown()
        )->shouldCache();
    }

    public function renderedContent() : Attribute
    {
        return Attribute::make(
            fn () => str($this->content ?? '')->marxdown()
        )->shouldCache();
    }

    public function renderedConclusion() : Attribute
    {
        return Attribute::make(
            fn () => str($this->conclusion ?? '')->marxdown()
        )->shouldCache();
    }

    public function renderedTeaser() : Attribute
    {
        return Attribute::make(
            fn () => str($this->teaser ?? '')->marxdown()
        )->shouldCache();
    }

    public function lastUpdate() : Attribute
    {
        return Attribute::make(
            fn () => ($this->updated_at ?? $this->created)->toDateTimeString()
        )->shouldCache();
    }

    public function renderedLastUpdate() : Attribute
    {
        return Attribute::make(
            fn () => ($this->updated_at ?? $this->created)->isoFormat('LL')
        )->shouldCache();
    }

    public function communityLinkDomain() : Attribute
    {
        return Attribute::make(
            fn () => str_replace('www.', '', Url::fromString($this->community_link)->getHost())
        );
    }
}
