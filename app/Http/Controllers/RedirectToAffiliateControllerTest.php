<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use App\Models\Click;
use App\Models\Affiliate;

class RedirectToAffiliateControllerTest extends TestCase
{
    public function test_it_redirects_to_affiliate_and_increases_clicks_count() : void
    {
        $affiliate = Affiliate::factory()->create(['clicks' => 0]);

        $this->assertEquals(0, $affiliate->clicks);

        $this->assertDatabaseCount(Click::class, 0);

        $this
            ->get(route('affiliate', [$affiliate, 'foo' => 'bar']))
            ->assertRedirect(trim($affiliate->link, '/') . '?foo=bar');

        $this->assertEquals(1, $affiliate->fresh()->clicks);

        $this->assertDatabaseHas(Click::class, ['affiliate_id' => $affiliate->id]);
    }

    public function test_it_throws_404_when_affiliate_does_not_exist() : void
    {
        $this
            ->get(route('affiliate', 'foo'))
            ->assertNotFound()
        ;
    }
}
