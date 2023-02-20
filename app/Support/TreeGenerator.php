<?php

namespace App\Support;

class TreeGenerator
{
    public static function generate(string $content) : array
    {
        $regex = '/<h(?<level>[1-6])(?:\s+id="(?<id>[^"]+)")?(?:\s+[^>]*)?>(?<content>.+?)<\/h[1-6]>/';

        preg_match_all($regex, $content, $matches);

        foreach ($matches[0] as $key => $value) {
            $tree[] = [
                'id' => $matches['id'][$key],
                'title' => trim(html_entity_decode(strip_tags($matches['content'][$key]))),
                'level' => $matches['level'][$key],
            ];
        }

        return $tree;
    }
}
