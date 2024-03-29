<?php

namespace App\Exceptions;

use Sentry\Laravel\Integration;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register() : void
    {
        $this->reportable(function (\Throwable $exception) {
            Integration::captureUnhandledException($exception);
        });
    }
}
