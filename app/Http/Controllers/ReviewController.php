<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(string $restaurantId)
    {
        $restaurant = \App\Models\Restaurant::findOrFail($restaurantId);
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

    public function create()
    {
        return view('review_create', [
            'restaurants' => \App\Models\Restaurant::all(),
            'users' => \App\Models\User::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'nullable|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
            'restaurant_id' => 'required|exists:restaurants,id',
            'user_id' => 'required|exists:users,id'
        ]);

        $review = new Review($validated);
        $review->save();

        return redirect()->to('/restaurants/' . $validated['restaurant_id'] . '/reviews');
    }

    public function edit(string $id)
    {
        return view('review_edit', [
            'review' => Review::all()->where('id', $id)->first(),
            'restaurants' => \App\Models\Restaurant::all(),
            'users' => \App\Models\User::all()
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'comment' => 'nullable|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
            'restaurant_id' => 'required|exists:restaurants,id',
            'user_id' => 'required|exists:users,id'
        ]);

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
        Review::destroy($id);
        return redirect()->to('/restaurants');
    }
}
