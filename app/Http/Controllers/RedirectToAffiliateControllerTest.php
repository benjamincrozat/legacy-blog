<?php

namespace App\Http\Controllers;

use Tests\TestCase;

class RedirectToAffiliateControllerTest extends TestCase
{
    public function test_it_redirects_to_cloudways() : void
    {
        $this
            ->get(route('affiliate', ['cloudways', 'id' => '1242932']))
            ->assertRedirect('https://www.cloudways.com/en/?id=1242932')
        ;
    }

    public function test_it_redirects_to_digitalocean() : void
    {
        $this
            ->get(route('affiliate', 'digitalocean'))
            ->assertRedirect('https://m.do.co/c/58bbdf89fc72')
        ;
    }

    public function test_it_redirects_to_fathom() : void
    {
        $this
            ->get(route('affiliate', 'fathom-analytics'))
            ->assertRedirect('https://usefathom.com/ref/JTPOCN')
        ;
    }

    public function test_it_redirects_to_jasper() : void
    {
        $this
            ->get(route('affiliate', ['jasper', 'fpr' => 'benjamincrozat']))
            ->assertRedirect('https://jasper.ai/?fpr=benjamincrozat')
        ;
    }

    public function test_it_redirects_to_tweet_hunter() : void
    {
        $this
            ->get(route('affiliate', ['tweet-hunter', 'via' => 'benjamincrozat']))
            ->assertRedirect('https://tweethunter.io/?via=benjamincrozat')
        ;
    }

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
