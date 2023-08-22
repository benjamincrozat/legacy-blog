<?php

use App\Models\User;

test('description is rendered as markdown and cached when accessed for the first time', function () {
    $user = User::factory()->create();

    $key = "User.$user->id.description." . sha1($user->description);

    expect(cache()->has($key))->toBeFalse();

    $user->presenter()->description();

    expect(cache()->has($key))->toBeTrue();
});
