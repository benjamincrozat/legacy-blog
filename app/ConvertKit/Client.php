<?php

namespace App\ConvertKit;

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
}
