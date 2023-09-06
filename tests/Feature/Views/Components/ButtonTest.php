<?php

use Illuminate\View\ComponentAttributeBag;

it('renders as a link', function () {
    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.button', [
        'attributes' => new ComponentAttributeBag([
            'href' => 'https://example.com',
        ]),
        'slot' => 'Example',
    ]);

    $view->contains('Example');

    $view->first('a')->hasAttribute('href', 'https://example.com');
});

it('adds the wire:navigate.hover to internal links', function () {
    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.button', [
        'attributes' => new ComponentAttributeBag([
            'href' => '/foo',
        ]),
        'slot' => 'Example',
    ]);

    $view->contains('Example');

    $view->first('a')->contains('wire:navigate.hover');
});

it('does not add the wire:navigate.hover attribute to internal links when forced to', function () {
    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.button', [
        'attributes' => new ComponentAttributeBag([
            'href' => '/foo',
        ]),
        'noWireNavigate' => true,
        'slot' => 'Example',
    ]);

    $view->first('a')->doesNotContain('wire:navigate.hover');
});

it('does not add the wire:navigate.hover to external links', function () {
    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.button', [
        'attributes' => new ComponentAttributeBag([
            'href' => 'https://example.com',
        ]),
        'slot' => 'Example',
    ]);

    $view->contains('Example');

    $view->first('a')->doesNotHaveAttribute('wire:navigate.hover');
});

it('renders as a button', function () {
    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.button', [
        'slot' => 'Example',
    ]);

    $view->contains('Example');

    $view->has('button');
});
