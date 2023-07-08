<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\YouTubeController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\RedirectToAffiliateController;

Route::get('/', HomeController::class)->name('home');

Route::post('/subscribe', SubscribeController::class)->name('subscribe');

Route::get('/recommends/{affiliate:slug}', RedirectToAffiliateController::class)->name('affiliate');

Route::get('/youtube-to-mp3', YouTubeController::class)->name('youtube-to-mp3');
Route::get('/youtube-to-mp4', YouTubeController::class)->name('youtube-to-mp4');

Route::feeds();

Route::get('/{post:slug}', ShowPostController::class)->name('posts.show');
