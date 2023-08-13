<?php

use function Pest\Laravel\get;

it('works', function () {
    get(route('home'))->assertOk();
});
