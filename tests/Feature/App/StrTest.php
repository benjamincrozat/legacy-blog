<?php

use App\Str;

it('generates IDs for headings', function () {
    expect(Str::markdown(<<<'MARKDOWN'
# Foo
## Bar
### Baz
MARKDOWN))
        ->toContain(
            'id="foo"',
            'id="bar"',
            'id="baz"',
        );
});

it('headings contain a link to themselves', function () {
    expect(Str::markdown('# Foo'))
        ->toContain('<a href="#foo">Foo</a>');
});

it('adds the adaquate attributes to external links', function () {
    expect(Str::markdown('https://example.com'))
        ->toContain('target="_blank"')
        ->toContain('rel="nofollow noopener noreferrer"');
});
