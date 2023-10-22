<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# LOGIN / REGISTER ROUTES
Route::post('register', [PassportController::class, 'register'])->name('api.register');
Route::post('login', [PassportController::class, 'login'])->name('api.login');

# RESTAURANTS ROUTES
Route::get('/restaurants', [RestaurantController::class, 'getAllRestaurants'])->name('api.restaurants.index');
Route::get('/restaurants/{id}', [RestaurantController::class, 'showRestaurantsOfUser'])->name('api.restaurants.showUserRestaurants')->middleware('auth:api');

# REVIEWS ROUTES
Route::get('/restaurants/reviews/all', [ReviewController::class, 'allRestaurantsAllReviews'])->name('api.reviews.all');
Route::get('/restaurant/{restaurant_id}/reviews/all', [ReviewController::class, 'restaurantAllReviews'])->name('api.reviews.restaurant.all');
Route::get('/restaurant/{restaurant_id}/reviews/average', [ReviewController::class, 'restaurantAllReviewsRating'])->name('api.reviews.restaurant.average');
Route::post('/restaurant/{restaurant_id}/review', [ReviewController::class, 'createReview'])->name('api.review.create')->middleware('auth:api');