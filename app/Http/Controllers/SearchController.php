<?php

namespace App\Http\Controllers;
Use App\Recipe;
Use App\Ingredient;
use Spatie\Searchable\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index(Request $request)
  {
    $results = (new Search())
    ->registerModel(Recipe::class, ['title'])
    ->search($request->input('query'));
    
    return response()->json($results);
  }
}
