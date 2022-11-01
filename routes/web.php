<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\ListPostsController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Http\Request;

Route::get('/', HomeController::class)->name('home');

Route::post('/subscribe', SubscribeController::class)->name('subscribe');

Route::feeds();

Route::get('/blog', ListPostsController::class)->name('posts.index');
Route::get('/{slug}', ShowPostController::class)->name('posts.show');

Route::get('/recommends/{slug}', function (Request $request, string $slug) {
    $queryString = $request->collect()->map(fn ($value, $key) => "$key=$value")->join('&');

    switch ($slug) {
        case 'cloudways':
            return redirect()->away("https://www.cloudways.com/en/?id=1242932&$queryString");
        default:
            abort(404);
    }
})->name('affiliate');
