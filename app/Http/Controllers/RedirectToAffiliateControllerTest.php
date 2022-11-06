<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use App\Models\Affiliate;

class RedirectToAffiliateControllerTest extends TestCase
{
    public function test_it_redirects_to_cloudways() : void
    {
        $affiliate = Affiliate::factory()->create(['clicks' => 0]);

        $this->assertEquals(0, $affiliate->clicks);

        $this
            ->get(route('affiliate', [$affiliate, 'foo' => 'bar']))
            ->assertRedirect(trim($affiliate->link, '/') . '?foo=bar');

        $this->assertEquals(1, $affiliate->fresh()->clicks);
    }

    public function test_it_throws_404_when_affiliate_does_not_exist() : void
    {
        $this
            ->get(route('affiliate', 'foo'))
            ->assertNotFound()
        ;
    }
}
