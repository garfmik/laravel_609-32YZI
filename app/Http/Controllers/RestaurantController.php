<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        $restaurants = Restaurant::paginate($perpage)->withQueryString();
        return view('restaurants', [
            'restaurants' => $restaurants
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
