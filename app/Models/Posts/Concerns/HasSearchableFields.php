<?php

namespace App\Models\Posts\Concerns;

use Laravel\Scout\Searchable;

trait HasSearchableFields
{
    use Searchable;

    public function toSearchableArray() : array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'introduction' => $this->rendered_introduction,
            'content' => strip_tags($this->rendered_content),
            'description' => $this->description,
            'image' => $this->image,
        ];
    }
}
