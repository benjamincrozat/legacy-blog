<?php

namespace App\CommonMark;

use Embed\Embed;
use Illuminate\Support\Str;
use League\CommonMark\Environment\Environment;
use Torchlight\Commonmark\V2\TorchlightExtension;
use League\CommonMark\Extension\Embed\EmbedExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\SmartPunct\SmartPunctExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\Embed\Bridge\OscaroteroEmbedAdapter;
use League\CommonMark\Extension\DescriptionList\DescriptionListExtension;
use League\CommonMark\Extension\DefaultAttributes\DefaultAttributesExtension;

class MarxdownConverter extends \League\CommonMark\MarkdownConverter
{
    public function __construct(bool $torchlight = true)
    {
        $environment = new Environment([
            'default_attributes' => [
                Heading::class => [
                    'id' => fn ($n) => md5(serialize($n)),
                ],
                Link::class => [
                    'rel' => function (Link $node) {
                        if (
                            // Is an external link.
                            ! str_contains($node->getUrl(), url('/')) &&
                            // And not an anchor.
                            ! Str::startsWith($node->getUrl(), '#')
                        ) {
                            return 'nofollow noopener noreferrer';
                        }
                    },
                    'target' => function (Link $node) {
                        if (
                            // Is an external link.
                            ! str_contains($node->getUrl(), url('/')) &&
                            // And not an anchor.
                            ! Str::startsWith($node->getUrl(), '#')
                        ) {
                            return '_blank';
                        }
                    },
                ],
            ],
            'embed' => [
                'adapter' => new OscaroteroEmbedAdapter(new Embed),
                'allowed_domains' => [
                    'twitter.com',
                    'vimeo.com',
                    'youtube.com',
                ],
                'fallback' => 'link',
            ],
        ]);
        $environment->addExtension(new AttributesExtension);
        $environment->addExtension(new CommonMarkCoreExtension);
        $environment->addExtension(new DefaultAttributesExtension);
        $environment->addExtension(new DescriptionListExtension);
        $environment->addExtension(new EmbedExtension);
        $environment->addExtension(new GithubFlavoredMarkdownExtension);
        $environment->addExtension(new SmartPunctExtension);
        $environment->addExtension(new TableExtension);

        if ($torchlight) {
            $environment->addExtension(new TorchlightExtension);
        }

        parent::__construct($environment);
    }
}
