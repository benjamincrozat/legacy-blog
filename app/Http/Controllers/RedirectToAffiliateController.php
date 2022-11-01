<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RedirectToAffiliateController extends Controller
{
    public function __invoke(Request $request, string $slug) : RedirectResponse
    {
        $queryString = http_build_query($request->all());

        switch ($slug) {
            case 'cloudways':
                return redirect()->away("https://www.cloudways.com/en/?id=1242932&$queryString");
            case 'kinsta':
                return redirect()->away('https://kinsta.com?kaid=AEFAUTRRTINA');
            default:
                abort(404);
        }
    }
}
