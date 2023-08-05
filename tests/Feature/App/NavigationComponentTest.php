<?php

use App\Models\User;
use PHPUnit\Framework\Assert;
use NunoMaduro\LaravelMojito\ViewAssertion;

// These tests use Laravel Mojito, which allows me to test Blade
// components in isolation instead of having to hit a route.

beforeEach(function () {
    ViewAssertion::macro('doesNotContain', function (string $string) {
        Assert::assertStringNotContainsString(
            (string) $string,
            $this->html,
            "Failed asserting that the text `{$string}` exists within `{$this->html}`."
        );

        return $this;
    });
});

it('does not display the admin menu to guests', function () {
    $this
        ->assertView('components.nav', ['attributes' => collect()])
        ->doesNotContain('Admin');
});

it('displays the admin menu to users', function () {
    $this
        ->actingAs(User::factory()->create())
        ->assertView('components.nav', ['attributes' => collect()])
        ->contains('Admin');
});
