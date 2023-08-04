<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\RedirectToAffiliateController;

Route::get('/', HomeController::class)->name('home');

Route::post('/subscribe', SubscribeController::class)->name('subscribe');

Route::view('/phpunit-to-pest', 'tools.phpunit-to-pest')->name('phpunit-to-pest');

Route::get('/recommends/{affiliate:slug}', RedirectToAffiliateController::class)->name('affiliate');

Route::feeds();

Route::get('/{post:slug}', ShowPostController::class)->name('posts.show');
