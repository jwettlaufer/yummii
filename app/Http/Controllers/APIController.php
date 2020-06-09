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

    public function search(Request $request)
    {
        // First we define the error message we are going to show if no keywords
        // existed or if no results found.
        $error = ['error' => 'No results found, please try with different keywords.'];

        // Making sure the user entered a keyword.
        if($request->has('q')) {

            // Using the Laravel Scout syntax to search the products table.
            $recipes = Recipe::search($request->get('q'))->get();

            // If there are results return them, if none, return the error message.
            return $recipes->count() ? $recipes : $error;

        }

        // Return the error message if no keywords existed
        return $error;
    }
}
