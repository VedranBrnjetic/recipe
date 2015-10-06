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

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::controllers([
   'password' => 'Auth\PasswordController',
]);

Route::get('/', 'RecipeController@index');
Route::resource('recipes', 'RecipeController');
Route::resource('users', 'UserController');
Route::resource('ingredients', 'IngredientController');
Route::post('/recipes/list', 'RecipeController@recipe_list');
//database setup
Route::get('/database/', function(){
	//Let's add Joe
	//DB::table('users')->insert(['name' => 'Joe','email'=>'Joe.ext@bbc.com','password' => bcrypt('IloveCooking')]);
	
	//Buying ingredients
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

	//Mixing up recipes
	// DB::table('recipes')->insert([
	// 	['name'=>'Lemon Chicken','cooking_time' => 30,'image_url'=>'lemon_chicken.jpg'],
	// 	['name'=>'Beef Stroganoff','cooking_time' => 30,'image_url'=>'beef_stroganoff.jpg'],
	// 	['name'=>'Caesar salad','cooking_time' => 25,'image_url'=>'caesar_salad.jpg']
	//	]);
	
	//Adding spices
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


	//return DB::select('select * from users;');
});
