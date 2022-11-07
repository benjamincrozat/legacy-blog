<?php

namespace App\Fathom;

use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;

class Client
{
    public function __construct(
        public readonly Factory $http
    ) {
    }

    protected function request() : PendingRequest
    {
        return $this->http->withToken(config('services.fathom.api_token'));
    }
}
