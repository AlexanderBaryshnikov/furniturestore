<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax\ReviewController;

Route::post('/review-offer', [ReviewController::class, 'getReviewsOffer']);
