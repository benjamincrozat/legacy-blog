<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\ListPostsController;
use App\Http\Controllers\ShowOpeningController;
use App\Http\Controllers\ListOpeningsController;
use App\Http\Controllers\ShowCategoryController;
use App\Http\Controllers\ShowMerchantController;

Route::get('/', HomeController::class)->name('home');

Route::get('/categories/{slug}', ShowCategoryController::class)->name('categories.show');

Route::get('/posts', ListPostsController::class)->name('posts.index');

Route::get('/recommends/{merchant:slug}', ShowMerchantController::class)->name('merchants.show');

Route::view('/phpunit-to-pest', 'pouest')->name('pouest');
Route::view('/pint-express', 'pint-express')->name('pint-express');

Route::view('/media-kit', 'media-kit')->name('media-kit');

Route::get('/jobs', ListOpeningsController::class)->name('openings.index');
Route::view('/jobs/create', 'openings.create')->name('openings.create');
Route::get('/jobs/{opening:slug}', ShowOpeningController::class)->name('openings.show');

Route::view('/sponsors', 'sponsors')->name('sponsors');

Route::view('/privacy', 'privacy')->name('privacy');

Route::view('/terms', 'terms')->name('terms');

Route::view('/dummy-store', 'dummy-store.index')->name('dummy-store.index');
Route::view('/dummy-store/cart', 'dummy-store.cart')->name('dummy-store.cart');

Route::feeds();

// This is a wildcard route. It must be the last one to avoid conflicts.
Route::get('/{slug}', ShowPostController::class)->name('posts.show');
