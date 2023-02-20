<?php

namespace Tests\Feature\App\CommonMark;

use Tests\TestCase;

class MarxdownConverterTest extends TestCase
{
    public function test_it_renders_headings_with_ids_and_fathom_event() : void
    {
        $this->assertStringContainsString(
            'id=',
            str("# D'abc `def`-._&")->marxdown()
        );
    }

    public function test_it_adds_rel_attribute_values_to_external_links() : void
    {
        $this->assertStringContainsString(
            'rel="nofollow noopener noreferrer" target="_blank"',
            str('[Apple](https://www.apple.com)')->marxdown()
        );
    }

    public function test_it_does_not_add_any_attribute_to_internal_links() : void
    {
        $this->assertStringContainsString(
            'href="' . url('/') . '">',
            str('[Foo](' . url('/') . ')')->marxdown()
        );

        $this->assertStringContainsString(
            'href="#foo"',
            str('[Foo](#foo)')->marxdown()
        );
    }

    public function test_it_adds_a_click_event_to_affiliate_links() : void
    {
        $this->assertStringContainsString(
            '@click="window.fathom?.trackGoal(\'LBJL4VHK\', 0)"',
            str('[Foo](' . url('/recommends/foo') . '')->marxdown()
        );
    }

    public function test_it_adds_a_click_event_to_external_links() : void
    {
        $this->assertStringContainsString(
            "window.fathom?.trackGoal('SMD2GKMN', 0)",
            str('[Apple](https://www.apple.com)')->marxdown()
        );
    }

    public function test_it_renders_tweets() : void
    {
        $this->markTestSkipped();
    }

    public function test_it_renders_vimeo() : void
    {
        $this->markTestSkipped();
    }

    public function test_it_renders_youtube() : void
    {
        $this->markTestSkipped();
    }
}
