<?php

namespace Tests\Feature\App\Http\Controllers;

use Tests\TestCase;
use App\Models\Affiliate;

class RedirectToAffiliateControllerTest extends TestCase
{
    public function test_it_redirects_to_affiliate() : void
    {
        $affiliate = Affiliate::factory()->create();

        $this
            ->get(route('affiliate', [$affiliate, 'foo' => 'bar']))
            ->assertRedirect(trim($affiliate->link, '/') . '?foo=bar');
    }

    public function test_it_throws_404_when_affiliate_does_not_exist() : void
    {
        $this
            ->get(route('affiliate', 'foo'))
            ->assertNotFound();
    }
}
