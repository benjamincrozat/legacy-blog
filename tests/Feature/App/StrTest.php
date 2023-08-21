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
