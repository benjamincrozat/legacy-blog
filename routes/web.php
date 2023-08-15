<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\ShowAffiliateController;

Route::get('/', HomeController::class)->name('home');

Route::get('/community', CommunityController::class)->name('community');

Route::get('/recommends/{affiliate:slug}', ShowAffiliateController::class)->name('affiliate.show');

Route::post('/subscribe', SubscribeController::class)->name('subscribe');

Route::view('/phpunit-to-pest', 'pouest')->name('pouest');

Route::feeds();

Route::post('/logout', LogoutController::class)->name('logout');

Route::view('/terms-of-service', 'terms-of-service')->name('terms-of-service');

// This is a wildcard route, so it should come last.
Route::get('/{post:slug}', ShowPostController::class)->name('posts.show');
