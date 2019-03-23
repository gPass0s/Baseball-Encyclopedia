@extends('layout')

@section('header')
	Index of Letters
@endsection

@section('content')
	
	@php ($letters = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'])
	<br>

	<p> <b> Search the Baseball Encyclopedia of Players by the first letter of the player's last name. </b></p>

 	@foreach ($letters as $letter)
 		<a style="font-size:38px;" href=/players/{{$letter}}> {{$letter}} </a>
	@endforeach

	<p style="font-size:20px";> Showing {{$players->count()}} results </p>

	<form action="/">
    	<input type="submit" value="Clear" />
	</form>


	@if($players->count())
		<div class="box">
			@foreach ($players as $player)
				<a href="/player/{{$player->id}}">  {{$player->name}} </a>
				<br>
			@endforeach
		</div>
	@endif

@endsection