<?php

use App\Models\User;

it('displays the author correctly', function () {
    $author = User::factory()->create();

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.post.author', compact('author'));

    $view->has('aside > .prose');

    $view
        ->first('img')
        ->hasAttribute('loading', 'lazy')
        ->hasAttribute('src', $author->presenter()->gravatar(256))
        ->hasAttribute('alt', $author->name);

    $view->contains("Written by $author->name");

    $view->contains($author->presenter()->description());

    $view->contains('Follow me on:');

    $view
        ->first("a[href=\"https://github.com/$author->github_handle\"]")
        ->hasAttribute('target', '_blank')
        ->hasAttribute('rel', 'nofollow noopener')
        ->contains('GitHub');

    $view
        ->first("a[href=\"https://x.com/$author->x_handle\"]")
        ->hasAttribute('target', '_blank')
        ->hasAttribute('rel', 'nofollow noopener')
        ->contains('X');
});
