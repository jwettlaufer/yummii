<?php

use Illuminate\Support\Facades\Route;
use App\Recipe;
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('recipes', 'RecipeController');

Route::resource('profile', 'ProfileController');

Route::post('/favorite/{recipe}', 'RecipeController@FavoriteRecipe');
Route::post('/unfavorite/{recipe}', 'RecipeController@unFavoriteRecipe');

Route::get('/favorite/{recipe}', 'RecipeController@faveCount');
Route::get('/my_favorites', 'UserController@myFavorites')->middleware('auth');

Route::post('/recipes/search', 'RecipeController@search')->name('search');
Route::get('/user_recipes', 'UserController@userRecipes')->middleware('auth');
