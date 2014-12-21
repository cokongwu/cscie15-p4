@extends("_master")

@section("title")
Voting
@stop

@section("navigation")
		<li> <a href="/">Welcome Page</a> </li>
		<li> <a href="/destination">Manage Destinations</a> </li>
		<li> <a href="/trip">Manage Trips</a> </li>
		<li> Voting </li>
@stop

@section("options")
{{ Form::open(array("url" => "/poll")) }}
	{{ Form::label("trip1", "Select trip 1") }}<br>	
	{{ Form::select("trip1", $tripSelect ) }}<br>
	{{ Form::label("trip2", "Select trip 2") }}<br>	
	{{ Form::select("trip2", $tripSelect ) }}<br>
	{{ Form::label("trip3", "Select trip 3") }}<br>	
	{{ Form::select("trip3", $tripSelect ) }}<br>
	{{ Form::label("trip4", "Select trip 4") }}<br>	
	{{ Form::select("trip4", $tripSelect ) }}<br>
	{{ Form::label("trip5", "Select trip 5") }}<br>	
	{{ Form::select("trip5", $tripSelect ) }}<br>
	{{ Form::submit("Create Poll") }}
{{ Form::close() }}
<hr>
<p>Use this to delete a poll</p>
{{ Form::open(array("url" => "/deletePoll")) }}
	{{ Form::label("poll", "Select Poll") }}<br>	
	{{ Form::select("poll", $pollSelect ) }}
	{{ Form::submit("Delete") }}
{{ Form::close() }}
@stop

@section("content")

@stop