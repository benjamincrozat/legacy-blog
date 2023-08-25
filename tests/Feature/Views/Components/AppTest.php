<?php

it('renders with the needed meta tags', function () {
    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.app');

    $view->hasMeta(['charset' => 'UTF-8']);

    $view->hasMeta([
        'name' => 'viewport',
        'content' => 'width=device-width, initial-scale=1, viewport-fit=cover',
    ]);
});

it('renders with the Tailwind CSS Play CDN included and configured to be almost barebones', function () {
    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.app');

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

it('includes the feed', function () {
    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.app');

    $view->first('link[type="application/atom+xml"]')
        ->hasAttribute('href', url(config('feed.feeds.main.url')))
        ->hasAttribute('title', config('feed.feeds.main.title'));
});

it('includes the canonical link tag using the original URL', function () {
    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.app', ['canonical' => 'https://example.com']);

    $view
        ->first('link[rel="canonical"]')
        ->hasAttribute('href', 'https://example.com');
});

it('includes the canonical link tag using the current URL', function () {
    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.app');

    $view
        ->first('link[rel="canonical"]')
        ->hasAttribute('href', config('app.url'));
});
