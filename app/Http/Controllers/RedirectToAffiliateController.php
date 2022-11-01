<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RedirectToAffiliateController extends Controller
{
    public function __invoke(Request $request, string $slug) : RedirectResponse
    {
        $queryString = $request->collect()->map(fn ($value, $key) => "$key=$value")->join('&');

        switch ($slug) {
            case 'cloudways':
                return redirect()->away("https://www.cloudways.com/en/?id=1242932&$queryString");
            default:
                abort(404);
        }
    }
}
