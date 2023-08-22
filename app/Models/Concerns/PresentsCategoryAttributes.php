<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait PresentsCategoryAttributes
{
    use RendersAttributes;

    public function longDescription() : Attribute
    {
        return $this->renderAttributeAsMarkdown(__FUNCTION__);
    }

    public function content() : Attribute
    {
        return $this->renderAttributeAsMarkdown(__FUNCTION__);
    }

    public function primaryColor() : Attribute
    {
        return Attribute::make(
            fn (?string $value) : string => $value ?? 'black',
        );
    }

    public function secondaryColor() : Attribute
    {
        return Attribute::make(
            fn (?string $value) : string => $value ?? 'white',
        );
    }
}
