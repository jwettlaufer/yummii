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

    public function userRecipes()
    {
        $userRecipes = Auth::user()->recipes()->get();

        return view('user.user_recipes', compact('userRecipes'));
    }
}
