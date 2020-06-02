<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Recipe;
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
        ->SimplePaginate(10);

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
            if( $file = $request->file('picture'))
            { $dest = 'img/';
                $fileName = date('YmdHis') .
                '_' .
                str_replace(' ', '_', $file->getClientOriginalName()
            );
                $file->move($dest, $fileName);
            }

            $recipe = new Recipe;
            $recipe->user_id = $user->id;
            $recipe->title = $validatedData['title'];
            $recipe->picture = $fileName;
            $recipe->directions = $validatedData['directions'];
            
            $recipe->save();

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

        $recipetUser = User::findOrFail($recipe->user_id);
        return view('recipes.show', compact('recipes', 'recipeUser'));
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

            return redirect('/recipes')->with('success', 'post has been deleted.');
        }
        return redirect('/recipes');
    }
}
