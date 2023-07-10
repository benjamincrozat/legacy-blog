<?php

namespace App\Http\Controllers;

use Spatie\Url\Url;
use App\Models\Affiliate;
use Pirsch\Facades\Pirsch;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RedirectToAffiliateController extends Controller
{
    public function __invoke(Request $request, Affiliate $affiliate) : RedirectResponse
    {
        Pirsch::track(
            'Clicked on affiliate',
            $affiliate->toArray(),
        );

        $link = Url::fromString($affiliate->link)
            ->withQueryParameters($request->all());

        return redirect()->away($link);
    }
}
