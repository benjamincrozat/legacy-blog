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
        $subscribers = collect();

        do {
            $response = $this->http
                ->get('https://api.convertkit.com/v3/subscribers', [
                    'api_secret' => config('services.convertkit.api_secret'),
                    'page' => $page ??= 1,
                ])
                ->throw()
                ->json();

            $subscribers = $subscribers->concat($response['subscribers']);

            ++$page;
        } while ($response['page'] < $response['total_pages']);

        return $subscribers->dd();
    }
}
