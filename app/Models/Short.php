<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Url\Url;

class Short extends Model
{
    use HasFactory;

    public function url() : Attribute
    {
        return Attribute::make(function ($value) {
            return Url::fromString($value)
                ->withQueryParameters([
                    'utm_campaign' => $this->utm_campaign,
                    'utm_content' => $this->utm_content,
                    'utm_medium' => $this->utm_medium,
                    'utm_source' => $this->utm_source,
                    'utm_term' => $this->utm_term,
                ])
                ->__toString();
        });
    }
}
