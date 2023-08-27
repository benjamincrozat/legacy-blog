<?php

namespace App;

use Stringable;
use League\CommonMark\Node\Node;
use League\CommonMark\Node\Inline\Text;
use League\CommonMark\Util\HtmlElement;
use League\CommonMark\Xml\XmlNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;

class HeadingRenderer implements NodeRendererInterface, XmlNodeRendererInterface
{
    /**
     * @param  Heading  $node
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer) : Stringable
    {
        Heading::assertInstanceOf($node);

        $tag = 'h' . $node->getLevel();

        $attributes = $node->data->get('attributes');

        if ($node->children()[0] instanceof Text) {
            $link = new HtmlElement('a', [
                'href' => '#' . Str::slug($childRenderer->renderNodes($node->children())),
            ], $childRenderer->renderNodes($node->children()));

            return new HtmlElement($tag, $attributes, $link);
        }

        return new HtmlElement($tag, $attributes, $childRenderer->renderNodes($node->children()));
    }

    public function getXmlTagName(Node $node) : string
    {
        return 'heading';
    }

    /**
     * @param  Heading  $node
     */
    public function getXmlAttributes(Node $node) : array
    {
        Heading::assertInstanceOf($node);

        return ['level' => $node->getLevel()];
    }
}
