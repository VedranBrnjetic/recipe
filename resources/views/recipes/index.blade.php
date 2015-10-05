@extends('layouts.home')
@section('htmlHeadSeo')
    <meta name="keywords" content="Recipes">
    <meta name="description" content="The recipe book">
    <meta name="author" content="Vedran Brnjetic for BBC">

    <title>BBC Recipes</title>
@endsection
@section('header')
    <header id="top" class="header">
        <div class="text-vertical-center">
           <div class="headings col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-12"> 
            <h1>BBC Recipe</h1>
            <h2>BBC Recipe book by Vedran Brnjetic</h2>
            <br>
            <a href="#about" class="btn btn-dark btn-lg">Find Out More</a>
          </div>
        </div>
    </header>
@endsection
@section('content')
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
@endsection