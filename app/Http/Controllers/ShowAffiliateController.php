<?php

namespace App\Http\Controllers;

use Spatie\Url\Url;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class ShowAffiliateController extends Controller
{
    public function __invoke(Request $request, Affiliate $affiliate) : RedirectResponse
    {
        $this->trackEvent($request, $affiliate);

        $link = Url::fromString($affiliate->link)
            ->withQueryParameters($request->all());

        return redirect()->away($link);
    }

    protected function trackEvent(Request $request, Affiliate $affiliate) : void
    {
        if (! config('services.pirsch.access_key')) {
            return;
        }

        $id = "$affiliate->id"; // Pirsch's API crashes when an integer is passed.
        $name = $affiliate->name;
        $link = $affiliate->link;

        $fullUrl = $request->fullUrl();
        $ip = $request->ip();
        $userAgent = $request->userAgent();
        $acceptLanguage = $request->header('Accept-Language');
        $referrer = $request->header('Referer');

        dispatch(function () use ($id, $name, $link, $fullUrl, $ip, $userAgent, $acceptLanguage, $referrer) {
            Http::withToken(config('services.pirsch.access_key'))
                ->retry(3)
                ->post('https://api.pirsch.io/api/v1/event', [
                    'event_name' => 'Clicked on Affiliate',
                    'event_meta' => [
                        'id' => $id,
                        'name' => $name,
                        'link' => $link,
                    ],
                    'url' => $fullUrl,
                    'ip' => $ip,
                    'user_agent' => $userAgent,
                    'accept_language' => $acceptLanguage,
                    'referrer' => $referrer,
                ])
                ->throw();
        });
    }
}
