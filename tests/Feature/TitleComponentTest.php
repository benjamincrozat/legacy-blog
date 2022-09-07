<?php

namespace Tests\Feature;

use Tests\TestCase;
use NunoMaduro\LaravelMojito\InteractsWithViews;

class TitleComponentTest extends TestCase
{
    use InteractsWithViews;

    public function test_it_show_h1_and_h2_on_home_page() : void
    {
        $response = $this->get(route('home'));

        $response
            ->assertView()
            ->in('h1')
            ->contains("Benjamin Crozat's blog")
        ;

        $response
            ->assertView()
            ->in('h2')
            ->contains('Everything PHP &amp; Laravel')
        ;
    }

    public function test_it_show_pagragraphs_on_other_pages() : void
    {
        $response = $this->get(route('posts.show', 'what-is-laravel'));

        $response
            ->assertView()
            ->in('p')
            ->contains("Benjamin Crozat's blog")
        ;

        $response
            ->assertView()
            ->in('p')
            ->contains('Everything PHP &amp; Laravel')
        ;
    }
}
