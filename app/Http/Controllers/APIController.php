<?php

namespace App\Http\Controllers;
use App\Ingredient;
use App\Recipe;
use App\Category;
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
    public function getCategories()
    {
        $categories = Category::all();
        return $categories;
    }

}
