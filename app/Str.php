<?php

namespace App;

use League\CommonMark\Node\Node;
use League\CommonMark\Node\Inline\Text;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Embed\EmbedExtension;
use Spatie\CommonMarkShikiHighlighter\HighlightCodeExtension;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\SmartPunct\SmartPunctExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\Embed\Bridge\OscaroteroEmbedAdapter;
use League\CommonMark\Extension\DefaultAttributes\DefaultAttributesExtension;

class Str extends \Illuminate\Support\Str
{
    public static function markdown($string, array $options = [])
    {
        $options = array_merge([
            'default_attributes' => [
                Heading::class => [
                    'id' => fn (Heading $heading) : string => Str::slug(
                        static::childrenToText($heading)
                    ),
                ],
            ],
            'embed' => [
                'adapter' => new OscaroteroEmbedAdapter,
                'allowed_domains' => ['github.com', 'twitter.com', 'vimeo.com', 'x.com', 'youtube.com'],
                'fallback' => 'link',
            ],
            'external_link' => [
                'internal_hosts' => preg_replace('/https?:\/\//', '', config('app.url')),
                'open_in_new_window' => true,
                'nofollow' => 'external',
                'noopener' => 'external',
                'noreferrer' => 'external',
            ],
        ], $options);

        $environment = (new Environment($options))
            ->addExtension(app(HighlightCodeExtension::class))
            ->addExtension(new AttributesExtension)
            ->addExtension(new CommonMarkCoreExtension)
            ->addExtension(new DefaultAttributesExtension)
            ->addExtension(app(EmbedExtension::class))
            ->addExtension(new ExternalLinkExtension)
            ->addExtension(new GithubFlavoredMarkdownExtension)
            ->addExtension(new SmartPunctExtension)
            ->addRenderer(Heading::class, new HeadingRenderer);

        return (string) (new MarkdownConverter($environment))->convert($string);
    }

    protected static function childrenToText(Node $node) : string
    {
        $text = '';

        foreach ($node->children() as $child) {
            if ($child instanceof Text) {
                $text .= $child->getLiteral();
            } else {
                $text .= static::childrenToText($child);
            }
        }

        return $text;
    }
}
