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
Route::get('/database/', function(){
	//DB::select('drop table ingredients_recipes;');
	return DB::select('show tables;');

});
