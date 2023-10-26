<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\TableController;

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
Route::get('/restaurants/{user_id}', [RestaurantController::class, 'showRestaurantsOfUser'])->name('api.restaurants.showUserRestaurants')->middleware('auth:api');
Route::post('/restaurant', [RestaurantController::class, 'createRestaurant'])->name('api.restaurant.createRestaurant')->middleware('auth:api');
Route::put('/restaurant/{restaurant_id}',[ RestaurantController::class, 'updateRestaurant'])->name('api.restaurants.updateRestaurant')->middleware('auth:api');
Route::delete('/restaurant/{restaurant_id}',[RestaurantController::class, 'deleteRestaurant'])->name('api.restaurants.deleteRestaurant')->middleware('auth:api');

# TABLES ROUTE
Route::post('restaurant/{restaurant_id}/tables', [TableController::class, 'insertTablesCapacity'])->name('api.tables.insertTablesCapacity')->middleware('auth:api');
Route::put('restaurant/{restaurant_id}/tables', [TableController::class, 'editCapacityOfTables'])->name('api.tables.editCapacityOfTables')->middleware('auth:api');

# REVIEWS ROUTES
Route::get('/restaurants/reviews/all', [ReviewController::class, 'allRestaurantsAllReviews'])->name('api.reviews.all');
Route::get('/restaurant/{restaurant_id}/reviews/all', [ReviewController::class, 'restaurantAllReviews'])->name('api.reviews.restaurant.all');
Route::get('/restaurant/{restaurant_id}/reviews/average', [ReviewController::class, 'restaurantAllReviewsRating'])->name('api.reviews.restaurant.average');
Route::post('/restaurant/{restaurant_id}/review', [ReviewController::class, 'createReview'])->name('api.review.create')->middleware('auth:api');

# RESERVATIONS ROUTES
Route::post('/restaurant/{restaurant_id}/reserve', [ReservationController::class, 'createReservation'])->name('api.reservation.create')->middleware('auth:api');
Route::get('/restaurant/{restaurant_id}/reservations', [ReservationController::class, 'showRestaurantReservations'])->name('api.reservation.show')->middleware('auth:api');
// Route::get('/restaurant/{restaurant_id}/tables', [xxxxxxxxxxx::class, 'showRestaurantTables'])->name('api.show');

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
