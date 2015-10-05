<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public $recipeIngredients=null;
     /**
     * The Ingredients that are a part of this Recipe.
     */
    public function ingredients()
    {
        return $this->belongsToMany('\App\Ingredient','ingredients_recipes')->withPivot('amount');
    }

     /**
     * The Users who starred this Recipe.
     */

    public function users()
    {
        return $this->belongsToMany('\App\User','recipes_users');
    }
}
