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
            'recipes.instructions'
        )
        ->orderBy('recipes.id', 'desc')
        ->SimplePaginate(6);

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
                'picture' => 'required',
                'instructions' => 'required'
            ));

            $recipe = new Recipe;
            $recipe->user_id = $user->id;
            $recipe->title = $validatedData['title'];
            $recipe->picture = $validatedData['picture'];
            $recipe->instructions = $validatedData['instructions'];
            
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
    }
}
