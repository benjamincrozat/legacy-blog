<?php

if (! function_exists('should_display_ads')) {
    function should_display_ads(bool $hide = false) : bool
    {
        if ($hide) {
            return false;
        }

        return app()->isProduction() && config('services.adsense.enabled');
    }
}
