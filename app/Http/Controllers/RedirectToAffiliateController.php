<?php

namespace App\Http\Controllers;

use Spatie\Url\Url;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class RedirectToAffiliateController extends Controller
{
    public function __invoke(Request $request, Affiliate $affiliate) : RedirectResponse
    {
        if (auth()->guest() && config('services.pirsch.access_key')) {
            Http::withToken(config('services.pirsch.access_key'))
                ->retry(3)
                ->post('https://api.pirsch.io/api/v1/event', [
                    'event_name' => 'Clicked on Affiliate',
                    // TODO: Make sure this works!
                    // 'event_meta' => [
                    //     'id' => $affiliate->id,
                    //     'name' => $affiliate->name,
                    //     'link' => $affiliate->link,
                    // ],
                    'url' => $request->fullUrl(),
                    'ip' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'accept_language' => $request->header('Accept-Language'),
                    'referrer' => $request->header('Referer'),
                ])
                ->throw();
        }

        $link = Url::fromString($affiliate->link)
            ->withQueryParameters($request->all());

        return redirect()->away($link);
    }
}
