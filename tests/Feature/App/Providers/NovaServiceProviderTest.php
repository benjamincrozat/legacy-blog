<?php

namespace Tests\Feature\App\Providers;

use Tests\TestCase;
use App\Models\User;

class NovaServiceProviderTest extends TestCase
{
    public function test_it_works() : void
    {
        $user = User::factory()->create(['email' => 'benjamincrozat@me.com']);

        $this
            ->actingAs($user)
            ->getJson('/nova')
            ->assertRedirect('/nova/resources/posts');
    }

    public function test_it_disallows_users() : void
    {
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->getJson('/nova')
            ->assertForbidden();
    }

    public function test_it_disallows_guests() : void
    {
        $this
            ->assertGuest()
            ->getJson('/nova')
            ->assertUnauthorized();
    }
}
