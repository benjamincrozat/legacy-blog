<?php

namespace App\Http\Controllers;

use Tests\TestCase;

class RedirectToAffiliateControllerTest extends TestCase
{
    public function test_it_redirects_to_vultr() : void
    {
        $this
            ->get(route('affiliate', ['vultr', 'ref' => '9270908']))
            ->assertRedirect('https://www.vultr.com/?ref=9270908')
        ;
    }

    public function test_it_throws_404_when_affiliate_does_not_exist() : void
    {
        $this
            ->get(route('affiliate', 'foo'))
            ->assertNotFound()
        ;
    }
}
