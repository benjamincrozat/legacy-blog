<?php

namespace App;

use DOMXPath;
use Exception;
use DOMElement;
use DOMDocument;

class Tree
{
    private array $stack = [];

    public function build(string $html) : array
    {
        // Silent errors about invalid tags.
        libxml_use_internal_errors(true);

        $domDocument = new DOMDocument;

        $domDocument->loadHTML(
            // Fixes issues with special characters. I don't know why they occur only in the tree.
            mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8')
        );

        $headings = (new DOMXPath($domDocument))->query('//h2|//h3|//h4|//h5|//h6');

        $tree = [];

        $this->stack = [&$tree];

        foreach ($headings as $heading) {
            $this->processHeading($heading);
        }

        return $tree;
    }

    private function processHeading(DOMElement $heading) : void
    {
        $level = (int) substr($heading->tagName, 1) - 1;

        $node = ['value' => $heading->nodeValue, 'children' => []];

        while (count($this->stack) > $level) {
            array_pop($this->stack);
        }

        if (count($this->stack) < $level) {
            throw new Exception('Invalid heading structure');
        }

        $parent = &$this->stack[count($this->stack) - 1];
        $parent[] = $node;

        $this->stack[] = &$parent[count($parent) - 1]['children'];
    }
}
