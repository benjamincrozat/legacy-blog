<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\YouTubeDownloaderController;
use App\Http\Controllers\RedirectToAffiliateController;

Route::get('/', HomeController::class)->name('home');

Route::post('/subscribe', SubscribeController::class)->name('subscribe');

Route::get('/recommends/{affiliate:slug}', RedirectToAffiliateController::class)->name('affiliate');

Route::get('/youtube-to-{format}', YouTubeDownloaderController::class)->name('youtube-to');

Route::feeds();

Route::get('/{post:slug}', ShowPostController::class)->name('posts.show');
