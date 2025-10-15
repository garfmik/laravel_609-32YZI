<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return view('reviews', [
            'reviews' => Review::all()
        ]);
    }

    public function show(string $id)
    {
        return view('review', [
            'review' => Review::all()->where('id', $id)->first()
        ]);
    }
}
