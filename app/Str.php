<?php

namespace App;

use League\CommonMark\Node\Node;
use League\CommonMark\Node\Inline\Text;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Environment\Environment;
use Torchlight\Commonmark\V2\TorchlightExtension;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\SmartPunct\SmartPunctExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\DefaultAttributes\DefaultAttributesExtension;

class Str extends \Illuminate\Support\Str
{
    public static function markdown($string, array $options = []) : string
    {
        $options = array_merge([
            'default_attributes' => [
                Heading::class => [
                    'id' => fn (Heading $heading) : string => Str::slug(
                        static::childrenToText($heading)
                    ),
                ],
            ],
            'disallowed_raw_html' => [
                'disallowed_tags' => ['title', 'textarea', 'style', 'xmp', 'noembed', 'noframes', 'script', 'plaintext'],
            ],
            'external_link' => [
                'internal_hosts' => preg_replace('/https?:\/\//', '', config('app.url')),
                'open_in_new_window' => true,
                'nofollow' => 'external',
                'noopener' => 'external',
                'noreferrer' => '',
            ],
        ], $options);

        $environment = (new Environment($options))
            ->addExtension(new AttributesExtension)
            ->addExtension(new CommonMarkCoreExtension)
            ->addExtension(new DefaultAttributesExtension)
            ->addExtension(new ExternalLinkExtension)
            ->addExtension(new GithubFlavoredMarkdownExtension)
            ->addExtension(new SmartPunctExtension)
            ->addExtension(new TorchlightExtension)
            // This new renderer adds an anchor link, just like in Laravel's documentation.
            ->addRenderer(Heading::class, new HeadingRenderer);

        return (string) (new MarkdownConverter($environment))->convert($string);
    }

    /**
     * This is a recursive method that will traverse the given
     * node and all of its children to get the text content.
     */
    protected static function childrenToText(Node $node) : string
    {
        $text = '';

        foreach ($node->children() as $child) {
            $text .= $child instanceof Text
                ? $child->getLiteral()
                : static::childrenToText($child);
        }

        return $text;
    }
}
