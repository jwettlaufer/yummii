<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Ingredient extends Model
{
  use Searchable;
    //
    protected $fillable = [
      'ingredient'
    ];
    
    public function recipes()
      {
        return $this->belongsToMany('App\Recipe', 'ingredient_recipe');
      }
}
