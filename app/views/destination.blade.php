@extends("_master")

@section("title")
Manage Destinations
@stop

@section("navigation")
		<li> <a href="/">Welcome Page</a> </li>
		<li> Manage Destinations </li>
		<li> <a href="/trip">Manage Trips</a> </li>
		<li> <a href="/poll">Voting</a> </li>
@stop

@section("options")
{{ Form::open(array("url" => "/destination")) }}

	{{ Form::label("name", "Name:") }}<br>
	{{ Form::text("name") }}<br><br>

	{{ Form::label("airport_code", "Airport Code:") }}<br>
	{{ Form::text("airport_code") }}<br><br>

	{{ Form::label("image", "Image:") }}<br>
	{{ Form::text("image") }}<br><br>

	{{ Form::submit("Submit") }}

{{ Form::close() }}
<hr>
<p>Use this to delete a destination</p>
{{ Form::open(array("url" => "/deleteDestination")) }}
	{{ Form::label("destination", "Select name") }}<br>	
	{{ Form::select("destination", $destSelect ) }}
	{{ Form::submit("Delete") }}
{{ Form::close() }}

@stop

@section("content")
	<p> {{ $destDisplay }} </p>
@stop