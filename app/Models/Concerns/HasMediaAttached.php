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
            ->addMediaConversion('small')
            ->fit(Manipulations::FIT_CONTAIN, 640, 640);

        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300);
    }
}
