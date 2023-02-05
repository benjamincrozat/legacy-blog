<?php

namespace Feature\Tests\App\Models;

use Tests\TestCase;
use App\Models\Short;

class ShortTest extends TestCase
{
    public function test_it_generates_a_slug_if_none_is_provided()
    {
        $short = Short::factory()->create(['slug' => null]);

        $this->assertEquals(5, strlen($short->slug));
        $this->assertNotNull($short->slug);
    }
}
