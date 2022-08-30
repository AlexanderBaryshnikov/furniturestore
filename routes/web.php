<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ArticleController;
use App\Http\Controllers\Web\OfferController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'articles',
    'as' => 'articles.',
] , function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('/{article:slug}', [ArticleController::class, 'show'])->name('page');
});

Route::group([
    'prefix' => 'offers',
    'as' => 'offers.',
] , function () {
    Route::get('/', [OfferController::class, 'index'])->name('index');
    Route::get('/{offer:slug}', [OfferController::class, 'show'])->name('page');
});
