<?php

namespace App\Http\Controllers;

use App\ConvertKit\Client;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Spatie\Honeypot\ProtectAgainstSpam;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware(ProtectAgainstSpam::class);
    }

    public function __invoke(Request $request, Client $client) : RedirectResponse
    {
        $request->validate(['email' => ['required', 'email']]);

        $client->subscribe($request->email);

        return back()->with('status', 'Almost there! Check your emails for confirmation.');
    }
}
