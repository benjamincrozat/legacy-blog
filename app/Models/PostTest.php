<?php

namespace App\Models;

use Tests\TestCase;

class PostTest extends TestCase
{
    public function test_it_creates_a_redirect_when_slug_changes() : void
    {
        $post = Post::factory()->create();

        $original = $post->slug;

        $post->update(['slug' => fake()->slug()]);

        $this->assertDatabaseHas(Redirect::class, [
            'from' => $original,
            'to' => $post->slug,
        ]);
    }

    public function test_it_does_not_create_a_redirect_when_slug_does_not_change() : void
    {
        $post = Post::factory()->create();

        $post->update(['slug' => $post->slug]);

        $this->assertDatabaseMissing(Redirect::class, [
            'from' => $post->slug,
            'to' => $post->slug,
        ]);
    }

    public function test_it_has_a_featured_scope() : void
    {
        Post::factory()->create(['image' => 'foo']);

        Post::factory()->create(['image' => null]);

        $this->assertCount(1, Post::featured()->get());
    }

    public function test_it_has_a_with_user_scope() : void
    {
        Post::factory()->create();

        $post = Post::withUser()->first();

        $this->assertEquals($post->user->name, $post->user_name);
        $this->assertEquals($post->user->email, $post->user_email);
    }

    public function test_it_has_a_read_time_attribute() : void
    {
        $post = Post::factory()->create(['content' => fake()->words(201, true)]);

        $this->assertEquals(2, $post->read_time);
    }

    public function test_it_feeds_the_feed() : void
    {
        Post::factory(10)->create();

        $this
            ->getJson('/feed')
            ->assertOk()
        ;
    }

    public function test_it_expands_the_table_of_contents_if_sharing_affiliate_links() : void
    {
        $this->markTestSkipped();

        $post = Post::factory()->create([
            'content' => <<<MARKDOWN
## Heading 2
### Heading 3
#### Heading 4
MARKDOWN,
            'promotes_affiliate_links' => true,
        ]);

        $this->assertCount(1, $post->getTableOfContents()->filter(fn ($h) => 3 === $h['level']));
        $this->assertCount(1, $post->getTableOfContents()->filter(fn ($h) => 4 === $h['level']));
    }

    public function test_it_expands_the_table_of_contents_if_asked_explicitly() : void
    {
        $this->markTestSkipped();

        $post = Post::factory()->create([
            'content' => <<<MARKDOWN
## Heading 2
### Heading 3
#### Heading 4
MARKDOWN,
            'expand_table_of_contents' => true,
            'promotes_affiliate_links' => true,
        ]);

        $this->assertCount(1, $post->getTableOfContents()->filter(fn ($h) => 3 === $h['level']));
        $this->assertCount(1, $post->getTableOfContents()->filter(fn ($h) => 4 === $h['level']));
    }
}
