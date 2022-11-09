<?php

namespace App\Models;

use Tests\TestCase;

class DealTest extends TestCase
{
    public function test_has_active_scope() : void
    {
        Deal::factory()->create();

        Deal::factory()->create(['start_at' => null]);

        Deal::factory()->create([
            'start_at' => now()->subWeek(),
            'end_at' => now()->subDay(),
        ]);

        $this->assertCount(1, Deal::active()->get());
    }

    public function test_has_an_affiliate_relationship() : void
    {
        $deal = Deal::factory()->create();

        $this->assertInstanceOf(Affiliate::class, $deal->affiliate);
    }
}
