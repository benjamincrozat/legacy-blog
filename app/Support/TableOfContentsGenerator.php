<?php

namespace App\Support;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class TableOfContentsGenerator
{
    public static function generate(string $content) : Collection
    {
        preg_match_all('/(#{1,6}) (.*)/', $content, $headings);

        $tableOfContents = [];

        for ($i = 0; $i < count($headings[0]); ++$i) {
            $title = html_entity_decode(strip_tags(Str::marxdown($headings[2][$i])));

            $tableOfContents[] = [
                'id' => str($title)->slug(),
                'title' => $title,
                'level' => strlen($headings[1][$i]),
            ];
        }

        return collect($tableOfContents);
    }
}
