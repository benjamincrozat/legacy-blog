<?php

namespace App\Http\Controllers;

use App\Models\Short;
use Illuminate\Http\RedirectResponse;

class RedirectToUrlController extends Controller
{
    public function __invoke(Short $short) : RedirectResponse
    {
        return redirect()->to($short->url);
    }
}
