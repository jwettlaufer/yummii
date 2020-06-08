<?php

namespace App\Http\Controllers;
use App\User;
use App\Profile;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ($user = Auth::user()) {
            return view('home');
        }
        return redirect('/recipes'); 
    }
}
