<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Str;

class StrTest extends TestCase
{
    public function test_it_renders_headings_with_ids() : void
    {
        $this->assertStringContainsString(
            'id="dabc-def"',
            Str::marxdown("# D'abc def-._&")
        );
    }

    public function test_it_renders_images_with_loading_lazy_attribute() : void
    {
        $this->assertStringContainsString(
            'loading="lazy"',
            Str::marxdown('![](https://example.com/some/image.jpg)')
        );
    }

    public function test_it_renders_external_links_with_appropriate_attributes() : void
    {
        $this->assertStringContainsString(
            'rel="nofollow noopener noreferrer" target="_blank"',
            Str::marxdown('[Apple](https://www.apple.com)')
        );
    }

    public function test_it_renders_internal_links_without_any_attribute() : void
    {
        $this->assertStringContainsString(
            'href="' . url('/') . '"',
            Str::marxdown('[Larabiz](' . url('/') . ')')
        );

        $this->assertStringContainsString(
            'href="#foo"',
            Str::marxdown('[Foo](#foo)')
        );
    }
}
