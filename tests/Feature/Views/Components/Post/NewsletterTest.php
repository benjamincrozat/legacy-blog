<?php

use Livewire\Volt\Volt;
use Facades\App\Actions\Subscribe;

it('subscribe a visitor', function () {
    Subscribe::shouldReceive('subscribe')->once();

    Volt::test('newsletter-form')
        ->assertSet('email', '')
        ->assertSee('I share what I learn')
        ->assertSee('Join 400+ developers')
        ->set('email', 'someone@gmail.com')
        ->call('subscribe')
        ->assertSet('email', 'someone@gmail.com')
        ->assertSee('Done. Check your inbox!')
        ->assertSee('Thank you!');
});
