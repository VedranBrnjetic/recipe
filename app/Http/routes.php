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
// Route::get('/database/', function(){
// 	DB::table('recipes')->insert([
// 		['name'=>'Lemon Chicken','cooking_time' => 30,'image_url'=>'lemon_chicken.jpg'],
// 		['name'=>'Beef Stroganoff','cooking_time' => 30,'image_url'=>'beef_stroganoff.jpg'],
// 		['name'=>'Caesar Salad','cooking_time' => 25,'image_url'=>'caesar_salad.jpg']
// 		]);
// 	return DB::select('select * from recipes;');
// });
