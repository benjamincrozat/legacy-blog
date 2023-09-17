<?php

namespace App\Http\Controllers;

use App\Actions\Subscribe;
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
        $validated = request()->validate(['email' => ['required', 'email']]);

        (new Subscribe)->subscribe($validated['email']);

        return back()->with('status', 'Almost there! Check your emails for confirmation.');
    }
}
