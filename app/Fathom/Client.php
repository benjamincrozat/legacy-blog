<?php

namespace App\Fathom;

use Illuminate\Support\Collection;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;

class Client
{
    public function __construct(
        public readonly Factory $http
    ) {
    }

    public function views() : Collection
    {
        return $this->request()
            ->get('https://api.usefathom.com/v1/aggregations', [
                'aggregates' => 'pageviews',
                'entity_id' => config('services.fathom.site_id'),
                'entity' => 'pageview',
                'field_grouping' => 'pathname',
            ])
            ->throw()
            ->collect();
    }

    public function request() : PendingRequest
    {
        return $this->http->withToken(config('services.fathom.api_token'));
    }
}
