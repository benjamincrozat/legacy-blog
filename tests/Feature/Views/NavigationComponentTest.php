<?php

use App\Models\User;
use PHPUnit\Framework\Assert;
use Illuminate\View\ComponentAttributeBag;
use NunoMaduro\LaravelMojito\ViewAssertion;

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
        ->assertView('components.navigation', ['attributes' => new ComponentAttributeBag])
        ->doesNotContain('Admin');
});

it('displays the admin menu to users', function () {
    $this
        ->actingAs(User::factory()->create())
        ->assertView('components.navigation', ['attributes' => new ComponentAttributeBag])
        ->contains('Admin');
});
