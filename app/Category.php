<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'category'
      ];
      
      public function  categories()
        {
          return $this->belongsToMany('App\Recipe', 'category_recipe', 'recipe_id');
        }
}
