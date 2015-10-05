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
@stop