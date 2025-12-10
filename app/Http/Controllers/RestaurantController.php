<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function favorite(string $id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login')->with('error', 'Сначала войдите в систему');
        }

        $restaurant = Restaurant::all()->where('id', $id)->first();
        if (!$restaurant) {
            return redirect('/restaurants')->with('error', 'Ресторан не найден');
        }

        // Добавляем в избранное
        $user->restaurants()->syncWithoutDetaching($restaurant->id);

        return redirect()->back()->with('success', 'Ресторан добавлен в избранное');
    }

    public function unfavorite(string $id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login')->with('error', 'Сначала войдите в систему');
        }

        $restaurant = Restaurant::all()->where('id', $id)->first();
        if (!$restaurant) {
            return redirect('/restaurants')->with('error', 'Ресторан не найден');
        }

        // Удаляем из избранного
        $user->restaurants()->detach($restaurant->id);

        return redirect()->back()->with('success', 'Ресторан удален из избранного');
    }
}
