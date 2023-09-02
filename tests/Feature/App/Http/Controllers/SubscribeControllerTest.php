<?php

use function Pest\Laravel\from;

use Illuminate\Support\Facades\Http;

test('guests can subscribe to newsletter', function () {
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

test('the form needs an email address', function () {
    from(route('home'))
        ->postJson(route('subscribe'))
        ->assertInvalid(['email' => 'required']);
});

test('the form needs a valid email address', function () {
    from(route('home'))
        ->postJson(route('subscribe'), ['email' => 'foo'])
        ->assertInvalid(['email' => 'email']);
});
