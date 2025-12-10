<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', 'Сначала войдите в систему');
        }

        return view('profile', [
            'user' => $user,
            'reviews' => $user->reviews()->with('restaurant')->get(),
            'favorites' => $user->restaurants
        ]);
    }
}
