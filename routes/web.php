<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurants/{id}', [RestaurantController::class, 'show']);

Route::post('/restaurants/{id}/favorite', [RestaurantController::class, 'favorite'])
    ->name('restaurants.favorite')->middleware('auth');


Route::delete('/restaurants/{id}/unfavorite', [RestaurantController::class, 'unfavorite'])
    ->name('restaurants.unfavorite')->middleware('auth');


Route::get('/restaurants/{restaurantId}/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{id}', [ReviewController::class, 'show']);

Route::get('/restaurants/{restaurantId}/reviews/create', [ReviewController::class, 'create'])->name('auth');

Route::post('/review', [ReviewController::class, 'store'])->middleware('auth');
Route::get('/review/edit/{id}', [ReviewController::class, 'edit'])->middleware('auth');
Route::post('/review/update/{id}', [ReviewController::class, 'update'])->middleware('auth');
Route::post('/review/destroy/{id}', [ReviewController::class, 'destroy'])->middleware('auth');

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/error', function () {
    return view('error', [
        'message' => session('message'),
        'restaurant_id' => session('restaurant_id')
    ]);
});
