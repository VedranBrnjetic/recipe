@extends('layouts.recipe')
@section('content')
	<h1>{{{ $recipe->name }}}</h1>
	
	<hr/>
	<a id="toggle-star" href="#"><i id="star-icon" class="fa  fa-2x text-primary"></i></p></a>
	<h3>Preparation time: {{{ $recipe->cooking_time }}} minutes.</h3>
	<h3> Ingredients</h3>
	@foreach($ingredients as $ingredient)
		<h4> {{ $ingredient->name }}  {{ $ingredient->pivot->amount }} {{ $ingredient->unit }}  </h4>
	@endforeach
						
@endsection