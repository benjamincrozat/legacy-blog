<?php

if (! function_exists('shouldDisplayAds')) {
    function should_display_ads(bool $hide = false) : bool
    {
        if ($hide) {
            return false;
        }

        return app()->isProduction() && config('services.adsense.enabled');
    }
}
