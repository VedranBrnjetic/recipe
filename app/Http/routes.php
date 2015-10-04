<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'RecipeController@index');
Route::resource('recipes', 'RecipeController');
Route::resource('users', 'UserController');
Route::resource('ingredients', 'IngredientController');
Route::post('/recipes/list', 'RecipeController@recipe_list');
Route::get('/database/', function(){
	// DB::table('ingredients')->insert([
	// 	['name'=>'Chicken Breasts','unit' => 'pieces','unit_representation'=>'x'],
	// 	['name'=>'Thyme','unit' => 'table spoons','unit_representation'=>'tsp'],
	// 	['name'=>'Lemon','unit' => 'pieces','unit_representation'=>'x'],
	// 	['name'=>'Beef','unit' => 'grams','unit_representation'=>'g'],
	// 	['name'=>'Mustard','unit' => 'grams','unit_representation'=>'g'],
	// 	['name'=>'Mushrooms','unit' => 'grams','unit_representation'=>'g'],
	// 	['name'=>'Lettuce','unit' => 'pieces','unit_representation'=>'x'],
	// 	['name'=>'Croutons','unit' => 'table spoons','unit_representation'=>'tsp'],
	// 	['name'=>'Parmesan','unit' => 'grams','unit_representation'=>'g']
	// 	]);

	// DB::table('ingredients_recipes')->insert([
	// 	['recipe_id' => 1,'ingredient_id' => 1, 'amount' => 4],
	// 	['recipe_id' => 1,'ingredient_id' => 2, 'amount' => 1],
	// 	['recipe_id' => 1,'ingredient_id' => 3, 'amount' => 2],
	// 	['recipe_id' => 2,'ingredient_id' => 4, 'amount' => 500],
	// 	['recipe_id' => 2,'ingredient_id' => 5, 'amount' => 25],
	// 	['recipe_id' => 2,'ingredient_id' => 6, 'amount' => 300],
	// 	['recipe_id' => 3,'ingredient_id' => 7, 'amount' => 2],
	// 	['recipe_id' => 3,'ingredient_id' => 8, 'amount' => 5],
	// 	['recipe_id' => 3,'ingredient_id' => 9, 'amount' => 50]
	// 	]);
	return DB::select('select * from ingredients;');
});
