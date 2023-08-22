<?php

use function Pest\Laravel\get;

it('works and display the Volt component', function () {
    get(route('pouest'))
        ->assertOk()
        ->assertViewIs('pouest')
        ->assertSeeLivewire('pouest');
});
