<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{

	/**
     * The Recipes that contain this Ingredient.
     */
  	public function recipes()
    {
        return $this->belongsToMany('App\Recipe')->withPivot('amount');
    }
}
