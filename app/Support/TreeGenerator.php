<?php

namespace App\Support;

class TreeGenerator
{
    public static function generate(string $content) : array
    {
        // AI wrote this. I don't know how it works, but it works!
        $regex = '/<h(?<level>[2-6])(?:\s+id="(?<id>[^"]+)")?(?:\s+[^>]*)?>(?<content>\X+?)<\/h[2-6]>/';

        preg_match_all($regex, $content, $matches);

        foreach ($matches[0] as $key => $value) {
            $tree[] = [
                'id' => $matches['id'][$key],
                'title' => str($matches['content'][$key])->stripTags()->htmlEntityDecode()->trim(),
                'level' => $matches['level'][$key],
            ];
        }

        return $tree ?? [];
    }
}
