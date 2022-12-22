<?php

namespace App\Models;

use Spatie\Url\Url;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Short extends Model
{
    use HasFactory;

    public static function booted() : void
    {
        static::creating(function (Short $short) {
            $short->slug ??= Str::random(5);
        });
    }

    public function url() : Attribute
    {
        return Attribute::make(function ($value) {
            return is_string($value) ? Url::fromString($value)
                ->withQueryParameters([
                    'utm_campaign' => $this->utm_campaign,
                    'utm_content' => $this->utm_content,
                    'utm_medium' => $this->utm_medium,
                    'utm_source' => $this->utm_source,
                    'utm_term' => $this->utm_term,
                ])
                ->__toString() : null;
        });
    }
}
