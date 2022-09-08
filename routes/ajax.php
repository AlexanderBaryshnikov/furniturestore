<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax\ReviewController;
use App\Http\Controllers\Ajax\OfferController;

Route::post('/review-offer', [ReviewController::class, 'getReviewsOffer']);

Route::post('/offers-catalog', [OfferController::class, 'getOffersCatalog']);
