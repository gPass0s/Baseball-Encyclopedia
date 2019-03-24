@extends('layout')

@section('header')
	{{$player->name}}
@endsection

@section('content')
	<br>
	<div align="center">
		<div id="div_left">
			<img src="{{$player->img_URL}}" width="150px">
		</div>
		<br>
		<div id="div_right">
			<p> <b> Position(s): </b>{{$player->position}} </p>
			<p> <b> Birthday: </b>{{$player->birthday}} </p>
			<p> <b> Place of birth: </b>{{$player->birthday_place}} </p>

			@php($names = explode(' ',$player->name))
			@php($letter = substr(end($names),0,1))

			<form action="/players/{{$letter}}">
    			<input type="submit" value="Go back"/>
			</form>
		</div>	
	</div>


@endsection

