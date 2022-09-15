<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class SubscribeControllerTest extends TestCase
{
    public function test_it_works() : void
    {
        Http::fakeSequence()
            ->push([
                'subscription' => [
                    'id' => 1,
                    'state' => 'inactive',
                    'created_at' => '2016-02-28T08:07:00Z',
                    'source' => null,
                    'referrer' => null,
                    'subscribable_id' => 1,
                    'subscribable_type' => 'form',
                    'subscriber' => ['id' => 1],
                ],
            ]);

        $this
            ->from(route('home'))
            ->postJson(route('subscribe'), ['email' => fake()->safeEmail()])
            ->assertRedirect(route('home'))
        ;
    }
}
