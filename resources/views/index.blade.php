@extends('layouts.home')
@section('htmlHeadSeo')
    <meta name="keywords" content="Recipes">
    <meta name="description" content="The recipe book">
    <meta name="author" content="Vedran Brnjetic for BBC">

    <title>BBC Recipes</title>
@stop
@section('about')
   <div class="col-lg-12 text-center">
                    <h2>Welcome to our Recipe book, we are sure you are hungry for more</h2>
                    <p class="lead">Start browsing our recipes today!</p>
                    <div class="row">
                        <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-12">
                            <div id="searchRecipes">
                              <div class="search-container col-lg-12">
                                
                                    <div class="row">    
                                        <div class="col-xs-8 col-xs-push-2">
                                            <div class="input-group">
                                                <div class="input-group-btn search-panel">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                        <span id="search_concept">Recipe name</span> <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                      <li><a href="#1">Recipe name</a></li>
                                                      <li><a href="#2">Ingredient name</a></li>
                                                      <li><a href="#3">Cooking time</a></li>
                                                    </ul>
                                                </div>
                                                
                                                    <input type="hidden" name="searchRecipes" value="1" id="search_param">         
                                                    <input type="text" class="form-control" id="search_query" name="searchQuery" placeholder="Search term...">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                                    </span>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="searchResults"></div>
                                    
                                
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
@stop