<?php

use App\Tree;
use ValueError;

it('generates a tree based on headings, no matter which tags they contain', function () {
    $tree = (new Tree)->build(<<<'HTML'
<h1>Heading 1</h1>
<h2><a href="#">Heading 2</a></h2>
<h2>Heading 2</h2>
<h3><strong>Heading 3</strong></h3>
<h2>Heading 2</h2>
HTML);

    expect($tree)->toEqual([
        [
            'value' => 'Heading 2',
            'children' => [],
        ],
        [
            'value' => 'Heading 2',
            'children' => [
                [
                    'value' => 'Heading 3',
                    'children' => [],
                ],
            ],
        ],
        [
            'value' => 'Heading 2',
            'children' => [],
        ],
    ]);
});

it('does not throw a value error when content is empty', function () {
    expect(fn () => (new Tree)->build(''))->not->toThrow(ValueError::class);
});
