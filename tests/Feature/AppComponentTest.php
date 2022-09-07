<?php

namespace Tests\Feature;

use Tests\TestCase;
use NunoMaduro\LaravelMojito\InteractsWithViews;
use PHPUnit\Framework\ExpectationFailedException;

class AppComponentTest extends TestCase
{
    use InteractsWithViews;

    public function test_it_uses_title_and_description_variables() : void
    {
        $this->assertView('components.app', [
            'title' => $title = fake()->sentence(),
            'description' => $description = fake()->paragraph(),
            'slot' => '',
        ])
            ->hasMeta(['content' => $description])
            ->in('title')
            ->contains($title)
        ;
    }

    public function test_it_links_icons() : void
    {
        $this->assertView('components.app', [
            'title' => $title = fake()->sentence(),
            'description' => $description = fake()->paragraph(),
            'slot' => '',
        ])
            ->has('link[rel="apple-touch-icon"][sizes="180x180"][href="/img/apple-touch-icon.png"]')
            ->has('link[rel="icon"][sizes="32x32"][href="/img/favicon-32x32.png"]')
            ->has('link[rel="icon"][sizes="16x16"][href="/img/favicon-16x16.png"]')
        ;
    }

    public function test_it_does_not_include_fathom_analytics_outside_production() : void
    {
        $this->expectException(ExpectationFailedException::class);

        $this
            ->assertView('components.app', ['slot' => ''])
            ->has('script[src="https://save-tonight-hey-jude.benjamincrozat.com/script.js"]')
        ;
    }

    public function test_it_includes_fathom_analytics_in_production() : void
    {
        app()['env'] = 'production';

        $this
            ->assertView('components.app', ['slot' => ''])
            ->has('script[src="https://save-tonight-hey-jude.benjamincrozat.com/script.js"]')
        ;
    }
}
