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

Route::post('/restaurant', [RestaurantController::class, 'createRestaurant'])->name('api.restaurant.createRestaurant')->middleware('auth:api');
Route::delete('/restaurant/{idUser}/{idRest}',[RestaurantController::class, 'deleteRestaurant'])->name('api.restaurants.deleteRestaurant')->middleware('auth:api');
Route::get('/restaurant/{idUser}/{idRest}',[ RestaurantController::class, 'getRestaurant'])->name('api.restaurants.getRestaurant')->middleware('auth:api');
Route::put('/restaurant/{idUser}/{idRest}',[ RestaurantController::class, 'updateRestaurant'])->name('api.restaurants.updateRestaurant')->middleware('auth:api');

# REVIEWS ROUTES
Route::get('/restaurants/reviews/latest', [ReviewController::class, 'allRestaurantsAllReviews'])->name('api.reviews');
Route::get('/restaurant/{restaurant_id}/reviews/latest', [ReviewController::class, 'restaurantAllReviews'])->name('api.reviews.');
Route::get('/restaurant/{restaurant_id}/reviews/rating', [ReviewController::class, 'restaurantAllReviewsRating'])->name('api.reviews.');
Route::post('/restaurant/{restaurant_id}/review', [ReviewController::class, 'createReview'])->name('api.review.createReview')->middleware('auth:api');