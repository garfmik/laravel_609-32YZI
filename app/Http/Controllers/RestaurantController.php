<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $perpage = $request->get('perpage', 2);

        $query = Restaurant::query();

        // Поиск по названию
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Фильтр по городу
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        // Фильтр по кухне
        if ($request->filled('cuisine')) {
            $query->where('cuisine', $request->cuisine);
        }

        // Фильтр по рейтингу
        if ($request->filled('rating')) {
            $query->where('rating', '>=', $request->rating);
        }

        $restaurants = $query->paginate($perpage)->withQueryString();

        $cities = Restaurant::select('city')->distinct()->pluck('city');
        $cuisines = Restaurant::whereNotNull('cuisine')->select('cuisine')->distinct()->pluck('cuisine');

        return view('restaurants', compact('restaurants', 'cities', 'cuisines'));
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
