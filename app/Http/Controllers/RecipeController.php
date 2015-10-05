<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class RecipeController extends Controller
{
    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => ['post', 'put', 'delete']));
        $this->middleware('auth',['on' => ['post', 'put', 'delete']]);
    }

     /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
     
    public function recipe_list()
    {

        if(\Input::has('searchRecipes')){
            $mode=\Input::get('searchRecipes');
            $term=\Input::get('searchQuery');
            if(!empty($mode)){
                switch($mode){
                    case 1:
                        $recipes = \App\Recipe::where('name','Like','%' .$term.'%')->with('ingredients')->get();
                        break;
                    case 2:
                        $recipes = \App\Recipe::whereHas('ingredients',function($q) use ($term){
                            $q->where('name','like','%'.$term.'%');
                        })->with('ingredients')->get();
                        break;
                    case 3:
                        $recipes = \App\Recipe::where('cooking_time','<=',$term)->with('ingredients')->get();
                        break;

                }
            }
        }
        else{
            $recipes = \App\Recipe::take(3)->with('ingredients')->get();
        }

        return $recipes->toJson();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = \App\Recipe::all();
       return \View::make('recipes.index')->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userid=\Auth::id();
        $recipe = \App\Recipe::findOrFail($id);
        $starredList = \App\Recipe::whereHas('users', function($q) use ($userid){
            
            $q->where('users.id','=',$userid);
            //echo'here';
        })->get();
        $ingredients = $recipe->ingredients()->get();

        return \View::make('recipes.show')
            ->withRecipe($recipe)
            ->withStarredRecipe($starredList)
            ->withIngredients($ingredients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
