<?php

namespace App\Providers;

use Tests\TestCase;
use App\Models\User;

class HorizonServiceProviderTest extends TestCase
{
    public function test_it_works() : void
    {
        $user = User::factory()->create(['email' => 'benjamincrozat@me.com']);

        $this
            ->actingAs($user)
            ->getJson('/horizon')
            ->assertOk();
    }

    public function test_it_disallows_users() : void
    {
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->getJson('/horizon')
            ->assertForbidden();
    }

    public function test_it_disallows_guests() : void
    {
        $this
            ->assertGuest()
            ->getJson('/horizon')
            ->assertForbidden();
    }
}
