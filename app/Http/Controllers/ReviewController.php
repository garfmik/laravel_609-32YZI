<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    public function index(string $restaurantId)
    {
        $restaurant = Restaurant::all()->where('id', $restaurantId)->first();
        return view('reviews', [
            'reviews' => $restaurant->reviews,
            'restaurant' => $restaurant
        ]);
    }


    public function show(string $id)
    {
        return view('review', [
            'review' => Review::all()->where('id', $id)->first()
        ]);
    }

    public function create(string $restaurantId)
    {
        $restaurant = Restaurant::all()->where('id', $restaurantId)->first();

        return view('review_create', [
            'restaurant' => $restaurant
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'nullable|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
            'restaurant_id' => 'required|exists:restaurants,id'
        ]);

        $validated['user_id'] = Auth::id();

        $review = new Review($validated);
        $review->save();

        return redirect()->to('/restaurants/' . $validated['restaurant_id'] . '/reviews');
    }

    public function edit(string $id)
    {
        $review = Review::all()->where('id', $id)->first();
        $restaurant = Restaurant::all()->where('id', $review->restaurant_id)->first();

        if (!Gate::allows('edit-review', $review)) {
            return redirect('/error')->with([
                'message' => 'У вас нет прав для редактирования этого отзыва.',
                'restaurant_id' => $review->restaurant_id
            ]);
        }

        return view('review_edit', [
            'review' => $review,
            'restaurant' => $restaurant
        ]);
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'comment' => 'nullable|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
            'restaurant_id' => 'required|exists:restaurants,id',
        ]);

        $validated['user_id'] = Auth::id();

        $review = Review::all()->where('id', $id)->first();
        $review->comment = $validated['comment'];
        $review->rating = $validated['rating'];
        $review->restaurant_id = $validated['restaurant_id'];
        $review->user_id = $validated['user_id'];
        $review->save();

        return redirect()->to('/restaurants/' . $review->restaurant_id . '/reviews');
    }

    public function destroy(string $id)
    {
        $review = Review::where('id', $id)->first();
        $restaurantId = $review->restaurant_id;
        if (!Gate::allows('destroy-review', $review)) {
            return redirect('/error')->with([
                'message' => 'У вас нет разрешения на удаление отзыва',
                'restaurant_id' => $review->restaurant_id
            ]);
        }
        Review::destroy($id);
        return redirect()->to("/restaurants/{$restaurantId}/reviews");
    }
}
