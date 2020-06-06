<?php

namespace App\Http\Controllers;
use App\Ingredient;
use App\Recipe;
use Illuminate\Http\Request;

class APIController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function getIngredients()
    {
        $ingredients = Ingredient::all();
        return $ingredients;
    }
}
