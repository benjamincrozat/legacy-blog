<?php

namespace App\Http\Controllers;

use Tests\TestCase;

class RedirectToAffiliateControllerTest extends TestCase
{
    public function test_it_redirects_to_affiliate_with_additional_query_string_parameters() : void
    {
        $this
            ->get(route('affiliate', ['cloudways', 'foo' => 'bar']))
            ->assertRedirect('https://www.cloudways.com/en/?id=1242932&foo=bar')
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
