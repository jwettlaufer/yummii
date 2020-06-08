<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Recipe extends Model
{
    //
    protected $fillable = array(
        'recipe_name', 'picture', 'description',
      );
    
      public function user()
      {
        return $this->belongsTo('App\User');
      }
      public function ingredients()
      {
        return $this->belongsToMany('App\Ingredient', 'ingredient_recipe');
      }

      public function favorited()
      {
        return (bool) Favorite::where('user_id', Auth::id())
          ->where('recipe_id', $this->id)
          ->first();
      }
    
      public function favorites()
      {
        return $this->hasMany(Favorite::class, 'recipe_id');
      }
}
