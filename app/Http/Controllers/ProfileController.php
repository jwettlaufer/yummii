<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\User;
use App\Profile;
use Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ($user = Auth::user()) {
            $user = Auth::user();
            $profile = Profile::query()
                ->join('users', 'profiles.user_id', '=', 'users.id') 
                ->first();
            return view('profile.index', compact('profile', 'user'));
        }
        // Redirect by default.
        return redirect('/recipes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     *public function create()
     *{
     *    //
     *}
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     *public function store(Request $request)
     *{
     *    //
     *}
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        $profile = Profile::findOrFail($id);
        return view('profile.show', compact('profile','user'));
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
            $user = User::findOrFail($id);
            $profile = Profile::findOrFail($id);
            return view('profile.edit', compact('profile','user'));
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
        $profile = Profile::findOrFail($id);
        if ($user = Auth::user()) {
            $validatedData = $request->validate(array(
                'name' => 'required'
            ));
            User::whereId($id)->update($validatedData);

            return redirect('/profile')->with('success', 'Profile has been updated.');
        }
        // Redirect by default.
        return redirect('/recipes');
    }
}
