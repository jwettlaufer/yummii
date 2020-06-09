<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Ingredient;
use App\User;
use App\Profile;
use Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $recipes = Recipe::query()
            ->join('users', 'recipes.user_id', '=', 'users.id')
            ->select(
                'recipes.id',
                'users.id as user_id',
                'users.name',
                'recipes.title',
                'recipes.picture',
                'recipes.directions'
            )
            ->orderBy('recipes.id', 'desc')
            ->paginate(12);

        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $user = Auth::user();
        if ($user)
            return view('recipes.create');
        else
            return redirect('/recipes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($user = Auth::user()) {
            $validatedData = $request->validate(array(
                'title' => 'required',
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'directions' => 'required'
            ));

            $fileName = '';
            if ($file = $request->file('picture')) {
                $dest = 'img/';
                $fileName = date('YmdHis') .
                    '_' .
                    str_replace(' ', '_', $file->getClientOriginalName());
                $file->move($dest, $fileName);
            }

            $recipe = new Recipe;
            $recipe->user_id = $user->id;
            $recipe->title = $validatedData['title'];
            $recipe->picture = $fileName;
            $recipe->directions = $validatedData['directions'];
            $recipe->save();

            $recipe->ingredients()->attach($request->ingredients);

            return redirect('/recipes')->with('success', 'Recipe has been saved.');
        }
        return redirect('/recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $recipe = Recipe::findOrFail($id);

        $recipeUser = User::findOrFail($recipe->user_id);
        return view('recipes.show', compact('recipe', 'recipeUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if ($user = Auth::user()) {
            $recipe = Recipe::findOrFail($id);

            return view('recipes.edit', compact('recipe'));
        }

        return redirect('/recipes');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($user = Auth::user()) {
            $validatedData = $request->validate(array(
                'title' => 'required',
                'picture' => 'required',
                'directions' => 'required'
            ));

            $recipe = Recipe::findOrFail($id);

            Recipe::whereId($id)->update($validatedData);

            return redirect('/recipes')->with('success', 'Recipe has been updated.');
        }
        // Redirect by default.
        return redirect('/recipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if ($user = Auth::user()) {
            $recipe = Recipe::findOrFail($id);

            $recipe->delete();

            return redirect('/recipes')->with('success', 'recipe has been deleted.');
        }
        return redirect('/recipes');
    }

    /**
     * favorite a particular recipe
     *
     * @param  Recipe $recipe
     * @return Response
     */
    public function favoriteRecipe(Recipe $recipe)
    {
        Auth::user()->favorites()->attach($recipe->id);

        return back();
    }

    /**
     * Unfavorite a particular recipe
     *
     * @param  Recipe $recipe
     * @return Response
     */
    public function unFavoriteRecipe(Recipe $recipe)
    {
        Auth::user()->favorites()->detach($recipe->id);

        return back();
    }

    public function faveCount(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        return $recipe->favorites()->count();
    }

    public function search(Request $request)
    {
        $q = $request->get('q');
        $recipes = Recipe::where('title', 'like', '%' . $q . '%')->paginate(8);
        if (count($recipes) > 0)
            return view('recipes.index', compact('recipes'));
        else return view('recipes.index')->withMessage('No recipes related to your search. Please try something else.');
    }
}
