<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!']);
});

Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurants/{id}', [RestaurantController::class, 'show']);
Route::get('/restaurants/{id}/favorites', [RestaurantController::class, 'showFavorites']);

Route::get('/restaurants/{restaurantId}/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{id}', [ReviewController::class, 'show']);

Route::get('/restaurants/{restaurantId}/reviews/create', [ReviewController::class, 'create']);

Route::post('/review', [ReviewController::class, 'store']);
Route::get('/review/edit/{id}', [ReviewController::class, 'edit']);
Route::post('/review/update/{id}', [ReviewController::class, 'update']);
Route::get('/review/destroy/{id}', [ReviewController::class, 'destroy']);

Route::get('/users/{id}', [UserController::class, 'show']);
