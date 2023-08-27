<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\ListPostsController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\ShowCategoryController;
use App\Http\Controllers\ShowMerchantController;

Route::get('/', HomeController::class)->name('home');

Route::get('/categories/{category:slug}', ShowCategoryController::class)->name('categories.show');

Route::get('/posts', ListPostsController::class)->name('posts.index');

Route::get('/recommends/{merchant:slug}', ShowMerchantController::class)->name('merchants.show');

Route::view('/phpunit-to-pest', 'pouest')->name('pouest');

Route::post('/subscribe', SubscribeController::class)->name('subscribe');

Route::feeds();

Route::view('/privacy', 'privacy')->name('privacy');

Route::view('/terms', 'terms')->name('terms');

Route::get('/{post:slug}', ShowPostController::class)->name('posts.show');
