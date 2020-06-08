<?php

namespace App\Http\Controllers;
use App\Recipe;
use App\Ingredient;
use App\User;
use App\Profile;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function myFavorites()
{
    $myFavorites = Auth::user()->favorites;

    return view('user.my_favorites', compact('myFavorites'));
}
}
