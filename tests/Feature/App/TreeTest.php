<?php

use App\Tree;

it('generates a tree based on headings', function () {
    $tree = (new Tree)->build(<<<'HTML'
<h1>Heading 1</h1>
<h2>Heading 2</h2>
<h2>Heading 2</h2>
<h3>Heading 3</h3>
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
