<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Spatie\Honeypot\ProtectAgainstSpam;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware(ProtectAgainstSpam::class);
    }

    public function __invoke() : RedirectResponse
    {
        request()->validate(['email' => ['required', 'email']]);

        Http::post('https://api.convertkit.com/v3/forms/' . config('services.convertkit.form_id') . '/subscribe', [
            'api_key' => config('services.convertkit.api_key'),
            'email' => request('email'),
            'tags' => [config('services.convertkit.main_tag_id')],
        ])
            ->throw()
            ->json();

        return back()->with('status', 'Almost there! Check your emails for confirmation.');
    }
}
