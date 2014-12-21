@extends("_master")

@section("title")
Manage Trips
@stop

@section("styles")
	<link rel="stylesheet" href="js/jquery-ui.min.css">
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="js/jquery-ui-1.10.4.min.css">
	<script>
		$(function() {
			$( ".datepicker" ).datepicker();
		});
	</script>
@stop

@section("navigation")
		<li> <a href="/">Welcome Page</a> </li>
		<li> <a href="/destination">Manage Destinations</a> </li>
		<li> Manage Trips </li>
		<li> <a href="/poll">Voting</a> </li>
@stop

@section("options")
{{ Form::open(array("url" => "/trip")) }}

	{{ Form::label("destination", "Destination:") }}<br>
	{{ Form::select("destination", $destSelect ) }}<br><br>

	{{ Form::label("depart", "Depart:") }}<br>
	{{ Form::text("depart", "mm/dd/yyyy", 
		array("class" => "datepicker")) }}<br><br>

	{{ Form::label("return", "Return:") }}<br>
	{{ Form::text("return", "mm/dd/yyyy", 
		array("class" => "datepicker")) }}<br><br>

	{{ Form::submit("Submit") }}

{{ Form::close() }}
<hr>
<p>Use this to delete a Trip</p>
{{ Form::open(array("url" => "/deleteTrip")) }}
	{{ Form::label("trip", "Select Trip") }}<br>	
	{{ Form::select("trip", $tripSelect )}}
	{{ Form::submit("Delete") }}
{{ Form::close() }}

@stop

@section("content")
	<p> {{ $tripDisplay }} </p>
@stop