<?php

namespace App;

use DOMXPath;
use Exception;
use DOMElement;
use DOMDocument;

// This has been wrote by ChatGPT. I just applied some formatting and made it a class. Here's a trick:
// 1. Use the Python code interpreter to increase the odds of getting the desired result.
// 2. Once done, ask it to convert the code to PHP.
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
            mb_convert_encoding(
                // The HTML tags are there so that DOMDocument
                // doesn't bug me when given an empty string.
                "<html>$html</html>",
                'HTML-ENTITIES',
                'UTF-8'
            )
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
