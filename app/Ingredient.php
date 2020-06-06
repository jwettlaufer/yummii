<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //
    protected $fillable = [
      'ingredient'
    ];
    
    public function recipes()
      {
        return $this->belongsToMany('App\Recipe', 'ingredient_recipe');
      }
}
