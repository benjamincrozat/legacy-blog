<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;

class Subscribe
{
    public function subscribe(string $email) : void
    {
        Http::post('https://api.convertkit.com/v3/forms/' . config('services.convertkit.form_id') . '/subscribe', [
            'api_key' => config('services.convertkit.api_key'),
            'email' => $email,
            'tags' => [config('services.convertkit.main_tag_id')],
        ])
            ->throw()
            ->json();
    }
}
