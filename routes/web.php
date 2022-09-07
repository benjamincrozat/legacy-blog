<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\SubscribeController;

Route::get('/test', function () {
    header('Location: https://www.google.com');

    http_response_code(301);

    exit;
});

Route::get('/', HomeController::class)->name('home');

Route::post('/subscribe', SubscribeController::class)->name('subscribe');

Route::feeds();

Route::get('/{slug}', ShowPostController::class)->name('posts.show');
