<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Recipe extends Model
{
    //
    protected $fillable = array(
        'recipe_name', 'picture', 'instructions',
      );
    
      public function user()
      {
        return $this->belongsTo('App\User');
      }
}
