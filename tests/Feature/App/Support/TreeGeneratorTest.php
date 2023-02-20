<?php

namespace Tests\Feature\App\Support;

use Tests\TestCase;
use App\Support\TreeGenerator;

class TreeGeneratorTest extends TestCase
{
    public function test_it_works() : void
    {
        $tree = TreeGenerator::generate(<<<HTML
<h1 id="foo">Foo</h1>
<h2 id="bar">Bar</h2>
<h3 id="baz">Baz</h3>
HTML);

        $this->assertEquals([
            [
                'id' => 'foo',
                'title' => 'Foo',
                'level' => 1,
            ],
            [
                'id' => 'bar',
                'title' => 'Bar',
                'level' => 2,
            ],
            [
                'id' => 'baz',
                'title' => 'Baz',
                'level' => 3,
            ],
        ], $tree);
    }
}
