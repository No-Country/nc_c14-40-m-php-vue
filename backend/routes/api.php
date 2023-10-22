<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReservationsController;

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

Route::get('/restaurant/{restaurant_id}/tables', [ReservationsController::class, 'showRestaurantTables'])->name('api.show');




# RESERVATIONS ROUTES
// crear una reserva

// ver todas las reservas de todos los restaurantes
// ver las reservas del restaurante
// ver las reservas del restaurante del dia (lunes, martes...)
// ver las reservas del restaurante del dia (lunes, martes...) a la hora concreta


// funciones de servicio:
// -> ver 
// ->
// ->
// ->
// ->
