<?php

use function Pest\Laravel\get;

test('the pouest route works', function () {
    get(route('pouest'))
        ->assertOk()
        ->assertViewIs('pouest')
        ->assertSeeLivewire('pouest');
});
