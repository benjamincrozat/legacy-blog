<?php

namespace App\CommonMark;

use Tests\TestCase;
use Illuminate\Support\Str;

class MarxdownConverterTest extends TestCase
{
    public function test_it_adds_loading_attribute_to_image() : void
    {
        $this->assertStringContainsString(
            'loading="lazy"',
            Str::marxdown('![](https://example.com/some/image.jpg)')
        );
    }

    public function test_it_lowers_brightness_of_images_in_dark_mode() : void
    {
        $this->assertStringContainsString(
            'class="dark:brightness-75"',
            Str::marxdown('![](https://example.com/some/image.jpg)')
        );
    }

    public function test_it_adds_rel_nofollow_noopener_noreferrer_attribute_to_external_links() : void
    {
        $this->assertStringContainsString(
            'rel="nofollow noopener noreferrer" target="_blank"',
            Str::marxdown('[Apple](https://www.apple.com)')
        );
    }

    public function test_it_adds_a_click_event_to_all_links() : void
    {
        $this->assertStringContainsString(
            '@click',
            Str::marxdown('[Apple](https://www.apple.com)')
        );
    }

    public function test_it_adds_a_click_event_with_special_ID_for_affiliate_links() : void
    {
        $this->assertStringContainsString(
            '@click="window.fathom?.trackGoal(\'LBJL4VHK\', 0)"',
            Str::marxdown('[Foo](' . url('/recommends/foo') . '')
        );
    }

    public function test_it_does_not_add_any_attribute_to_internal_links() : void
    {
        $this->assertStringContainsString(
            'href="' . url('/') . '">',
            Str::marxdown('[Larabiz](' . url('/') . ')')
        );

        $this->assertStringContainsString(
            'href="#foo"',
            Str::marxdown('[Foo](#foo)')
        );
    }

    public function test_it_adds_a_alpine_click_event_attribute_to_links_to_send_a_fathom_event() : void
    {
        $this->assertStringContainsString(
            "window.fathom?.trackGoal('SMD2GKMN', 0)",
            Str::marxdown('[Apple](https://www.apple.com)')
        );
    }

    public function test_it_renders_headings_with_ids() : void
    {
        $this->assertStringContainsString(
            'id="dabc-def"',
            Str::marxdown("# D'abc def-._&")
        );
    }
}
