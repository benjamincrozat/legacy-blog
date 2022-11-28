<?php

namespace App\Support;

use Tests\TestCase;

class HelpersTest extends TestCase
{
    public function test_it_hides_ads_outside_of_production() : void
    {
        $this->assertFalse(should_display_ads());
    }

    public function test_it_does_not_show_ads_outside_production_even_when_enabled() : void
    {
        config(['services.ads.enabled' => true]);

        $this->assertFalse(should_display_ads());
    }

    public function test_it_shows_ads_in_production() : void
    {
        app()['env'] = 'production';

        config(['services.ads.enabled' => true]);

        $this->assertTrue(should_display_ads());
    }
}
