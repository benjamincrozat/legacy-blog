<?php

namespace App\ConvertKit;

use Illuminate\Support\Collection;
use Illuminate\Http\Client\Factory;

class Client
{
    public function __construct(
        public readonly Factory $http
    ) {
    }

    public function subscribe(string $email) : array
    {
        return $this->http
            ->post('https://api.convertkit.com/v3/forms/' . config('services.convertkit.form_id') . '/subscribe', [
                'api_key' => config('services.convertkit.api_key'),
                'email' => $email,
            ])
            ->throw()
            ->json();
    }

    public function subscribers() : Collection
    {
        return $this->http
            ->get('https://api.convertkit.com/v3/subscribers', [
                'api_secret' => config('services.convertkit.api_secret'),
            ])
            ->throw()
            ->collect('subscribers');
    }
}
