<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
     /**
     * The Ingredients that are a part of this Recipe.
     */
    // public function ingredients()
    // {
    //     return $this->belongsToMany('App\Ingredient')->withPivot('amount');
    // }

     /**
     * The Users who starred this Recipe.
     */

    // public function usersStarred()
    // {
    //     return $this->belongsToMany('App\User');
    // }
}
