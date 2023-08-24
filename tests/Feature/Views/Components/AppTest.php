<?php

it('renders', function () {
    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.app');

    $view->hasMeta(['charset' => 'UTF-8']);

    $view->hasMeta([
        'name' => 'viewport',
        'content' => 'width=device-width, initial-scale=1, viewport-fit=cover',
    ]);

    $view->has('script[src="https://cdn.tailwindcss.com"]');

    $view
        ->has('script')
        ->contains(<<<'HTML'
        tailwind.config = {
            corePlugins: [
                'accentColor',
                'backgroundColor',
                'borderColor',
                'boxShadowColor',
                'caretColor',
                'divideColor',
                'gradientColorStops',
                'outlineColor',
                'placeholderColor',
                'ringColor',
                'ringOffsetColor',
                'textDecorationColor',
                'textColor',
            ],
        }
HTML);
});
