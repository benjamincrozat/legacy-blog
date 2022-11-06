<?php

namespace App\Http\Controllers;

use Spatie\Url\Url;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RedirectToAffiliateController extends Controller
{
    public function __invoke(Request $request, Affiliate $affiliate) : RedirectResponse
    {
        $link = Url::fromString($affiliate->link)
            ->withQueryParameters($request->all());

        dispatch(function () use ($affiliate) {
            $affiliate->increment('clicks');
            $affiliate->clicks()->create();
        })->afterResponse();

        return redirect()->away($link);
    }
}
