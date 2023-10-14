<?php

namespace App\Models\Concerns;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasMediaAttached
{
    use InteractsWithMedia;

    public function registerMediaCollections() : void
    {
        $this
            ->addMediaCollection('image')
            ->singleFile();

        $this->addMediaCollection('images');
    }

    public function registerMediaConversions(Media $media = null) : void
    {
        $this
            ->addMediaConversion('optimized')
            ->fit(Manipulations::FIT_CONTAIN, 1500, 1500);

        $this
            ->addMediaConversion('large')
            ->fit(Manipulations::FIT_CONTAIN, 1200, 1200);

        $this
            ->addMediaConversion('medium')
            ->fit(Manipulations::FIT_CONTAIN, 1000, 1000);

        $this
            ->addMediaConversion('small')
            ->fit(Manipulations::FIT_CONTAIN, 600, 600);

        $this
            ->addMediaConversion('thumbnail')
            ->fit(Manipulations::FIT_CROP, 300, 300);
    }
}
