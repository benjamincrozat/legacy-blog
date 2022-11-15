<?php

namespace App\Models;

use Tests\TestCase;

class DealTest extends TestCase
{
    public function test_has_active_scope() : void
    {
        Deal::factory()->forAffiliate()->create();

        Deal::factory()->create(['start_at' => null]);

        Deal::factory()->create([
            'start_at' => now()->subWeek(),
            'end_at' => now()->subDay(),
        ]);

        $this->assertCount(1, Deal::active()->get());
    }

    public function test_has_an_highlighted_scope() : void
    {
        $deal = Deal::factory()->forAffiliate()->create([
            'highlighted' => true,
            'end_at' => now()->addWeek(),
        ]);

        Deal::factory()->forAffiliate()->create([
            'end_at' => now()->addWeek(),
        ]);

        $firstDeal = Deal::active()->highlightedFirst()->first();

        $this->assertTrue($firstDeal->is($deal));
    }

    public function test_has_an_affiliate_relationship() : void
    {
        $deal = Deal::factory()->forAffiliate()->create();

        $this->assertInstanceOf(Affiliate::class, $deal->affiliate);
    }
}
