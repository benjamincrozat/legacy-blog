<?php

use function Pest\Laravel\from;
use Illuminate\Support\Facades\Http;

it('works', function () : void {
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

    from(route('home'))
        ->postJson(route('subscribe'), ['email' => fake()->safeEmail()])
        ->assertValid(['email'])
        ->assertRedirect(route('home'));
});
