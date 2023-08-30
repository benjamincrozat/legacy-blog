<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TrackPageView implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public string $url,
        public string $ip,
        public string $userAgent,
        public ?string $acceptLanguage,
        public ?string $referrer
    ) {
    }

    public function handle() : void
    {
        Http::withToken(config('services.pirsch.access_key'))
            ->retry(3)
            ->post('https://api.pirsch.io/api/v1/hit', [
                'url' => $this->url,
                'ip' => $this->ip,
                'user_agent' => $this->userAgent,
                'accept_language' => $this->acceptLanguage ?? '',
                'referrer' => $this->referrer ?? '',
            ])
            ->throw();
    }
}
