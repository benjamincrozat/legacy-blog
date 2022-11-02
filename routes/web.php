<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\ListPostsController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\RedirectToAffiliateController;

Route::get('/', HomeController::class)->name('home');

Route::post('/subscribe', SubscribeController::class)->name('subscribe');

Route::get('/recommends/{slug}', RedirectToAffiliateController::class)->name('affiliate');

Route::feeds();

Route::get('/blog', ListPostsController::class)->name('posts.index');
Route::get('/{slug}', ShowPostController::class)->name('posts.show');
