<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TrackClickOnMerchant implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public string $id,
        public string $name,
        public string $link,
        public string $fullUrl,
        public ?string $ip,
        public ?string $userAgent,
        public ?string $acceptLanguage,
        public ?string $referrer
    ) {
    }

    public function handle() : void
    {
        Http::withToken(config('services.pirsch.access_key'))
            ->retry(3)
            ->post('https://api.pirsch.io/api/v1/event', [
                'event_name' => 'Clicked on Merchant',
                'event_meta' => [
                    'id' => $this->id,
                    'name' => $this->name,
                    'link' => $this->link,
                ],
                'url' => $this->fullUrl,
                'ip' => $this->ip,
                'user_agent' => $this->userAgent,
                'accept_language' => $this->acceptLanguage,
                'referrer' => $this->referrer,
            ])
            ->throw();
    }
}
