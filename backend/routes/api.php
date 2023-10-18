<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\PassportController;

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

Route::post('register', [PassportController::class, 'register'])->name('api.register');
Route::post('login', [PassportController::class, 'login'])->name('api.login');

Route::get('/restaurants', [RestaurantController::class, 'index'])->name('api.restaurants.index');

// De esta manera, el usuario para acceder a la ruta necesita el token de login (en este caso no hace falta crear un propio middleware) <- No token === error 500
Route::middleware('auth:api')->get('/restaurants/{id}', [RestaurantController::class, 'showUserRestaurants'])->name('api.restaurants.showUserRestaurants');
