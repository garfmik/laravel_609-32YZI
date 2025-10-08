<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        return view('restaurants',
            ['restaurants' => Restaurant::all()
            ]);
    }

    public function show(string $id)
    {
        return view('restaurant',[
            'restaurant' => Restaurant::all()->where('id', $id)->first()
        ]);
    }

    public function showFavorites(string $id)
    {
        return view('restaurant_favorites', [
            'restaurant' => Restaurant::all()->where('id', $id)->first()
        ]);
    }
}
