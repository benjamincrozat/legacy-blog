<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait PresentsMerchantAttributes
{
    use RendersAttributes;

    public function take() : Attribute
    {
        return $this->renderAttributeAsMarkdown(__FUNCTION__);
    }

    public function keyFeatures() : Attribute
    {
        return $this->renderAttributeAsMarkdown(__FUNCTION__);
    }

    public function content() : Attribute
    {
        return $this->renderAttributeAsMarkdown(__FUNCTION__);
    }

    public function pros() : Attribute
    {
        return $this->renderAttributeAsMarkdown(__FUNCTION__);
    }

    public function cons() : Attribute
    {
        return $this->renderAttributeAsMarkdown(__FUNCTION__);
    }
}
