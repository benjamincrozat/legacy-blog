<?php

namespace App\Http\Controllers;

use Spatie\Url\Url;
use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Jobs\TrackClickOnMerchant;
use Illuminate\Http\RedirectResponse;

class ShowMerchantController extends Controller
{
    public function __invoke(Request $request, Merchant $merchant) : RedirectResponse
    {
        $this->trackEvent($request, $merchant);

        $link = Url::fromString($merchant->link)
            ->withQueryParameters($request->all());

        return redirect()->away($link);
    }

    protected function trackEvent(Request $request, Merchant $merchant) : void
    {
        if (! config('services.pirsch.access_key')) {
            return;
        }

        if (1 === $request->user()?->id) {
            return;
        }

        TrackClickOnMerchant::dispatch(
            "$merchant->id", // Pirsch's API crashes when an integer is passed.
            $merchant->name,
            $merchant->link,
            $request->fullUrl(),
            $request->ip(),
            $request->userAgent(),
            $request->header('Accept-Language'),
            $request->header('Referer')
        );
    }
}
