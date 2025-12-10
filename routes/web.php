<?php

use App\Http\Controllers\LoginController;
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

Route::get('/restaurants/{id}/favorite', [RestaurantController::class, 'favorite']);
Route::get('/restaurants/{id}/unfavorite', [RestaurantController::class, 'unfavorite']);

Route::get('/restaurants/{restaurantId}/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{id}', [ReviewController::class, 'show']);
Route::get('/restaurants/{restaurantId}/reviews/create', [ReviewController::class, 'create'])->name('auth');

Route::post('/review', [ReviewController::class, 'store'])->middleware('auth');
Route::get('/review/edit/{id}', [ReviewController::class, 'edit'])->middleware('auth');
Route::post('/review/update/{id}', [ReviewController::class, 'update'])->middleware('auth');
Route::post('/review/destroy/{id}', [ReviewController::class, 'destroy'])->middleware('auth');

Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/profile', [UserController::class, 'profile']);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/error', function () {
    return view('error', [
        'message' => session('message'),
        'restaurant_id' => session('restaurant_id')
    ]);
});
