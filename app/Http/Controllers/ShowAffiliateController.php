<?php

namespace App\Http\Controllers;

use Spatie\Url\Url;
use App\Jobs\TrackEvent;
use App\Models\Affiliate;
use Illuminate\Http\Request;
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

        $pendingDispatch = dispatch(
            new TrackEvent($id, $name, $link, $fullUrl, $ip, $userAgent, $acceptLanguage, $referrer)
        );

        if (! app()->isLocal() && ! app()->runningUnitTests()) {
            $pendingDispatch->afterResponse();
        }
    }
}
