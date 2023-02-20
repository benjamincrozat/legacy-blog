<?php

namespace Tests\Feature\App\Support;

use Tests\TestCase;
use Illuminate\Support\Str;
use App\Support\TableOfContentsGenerator;

class TableOfContentsGeneratorTest extends TestCase
{
    public function test_it_works() : void
    {
        $tableOfContents = TableOfContentsGenerator::generate(<<<MARKDOWN
# `Foo`
## Bar
### Baz
MARKDOWN);

        $this->assertEquals([
            [
                'id' => 'acbd18db4cc2f85cedef654fccc4a4d8',
                'title' => 'Foo',
                'level' => 1,
            ],
            [
                'id' => '37b51d194a7513e45b56f6524f2d51f2',
                'title' => 'Bar',
                'level' => 2,
            ],
            [
                'id' => '73feffa4b7f6bb68e44cf984c85f6e88',
                'title' => 'Baz',
                'level' => 3,
            ],
        ], $tableOfContents);
    }

    public function test_it_adds_rel_attribute_values_to_external_links() : void
    {
        $this->assertStringContainsString(
            'rel="nofollow noopener noreferrer" target="_blank"',
            Str::marxdown('[Apple](https://www.apple.com)')
        );
    }

    public function test_it_does_not_add_any_attribute_to_internal_links() : void
    {
        $this->assertStringContainsString(
            'href="' . url('/') . '">',
            Str::marxdown('[Foo](' . url('/') . ')')
        );

        $this->assertStringContainsString(
            'href="#foo"',
            Str::marxdown('[Foo](#foo)')
        );
    }

    public function test_it_adds_a_click_event_to_affiliate_links() : void
    {
        $this->assertStringContainsString(
            '@click="window.fathom?.trackGoal(\'LBJL4VHK\', 0)"',
            Str::marxdown('[Foo](' . url('/recommends/foo') . '')
        );
    }

    public function test_it_adds_a_click_event_to_external_links() : void
    {
        $this->assertStringContainsString(
            "window.fathom?.trackGoal('SMD2GKMN', 0)",
            Str::marxdown('[Apple](https://www.apple.com)')
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
