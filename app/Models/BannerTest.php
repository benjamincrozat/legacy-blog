<?php

namespace App\Models;

use Tests\TestCase;

class BannerTest extends TestCase
{
    public function test_has_active_scope() : void
    {
        Banner::factory()->create();

        Banner::factory()->create(['start_at' => now()->addDay()]);

        $this->assertCount(1, Banner::active()->get());
    }

    public function test_has_an_affiliate_relationship() : void
    {
        $banner = Banner::factory()->create();

        $this->assertInstanceOf(Affiliate::class, $banner->affiliate);
    }
}
