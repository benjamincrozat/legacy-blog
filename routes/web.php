<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\ShowCategoryController;

Route::get('/', HomeController::class)->name('home');

Route::get('/{post:slug}', ShowPostController::class)->name('posts.show');

Route::get('/categories/{category:slug}', ShowCategoryController::class)->name('categories.show');

Route::feeds();
