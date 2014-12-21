@extends("_master")

@section("title")
Sign-up Page
@stop

@section("navigation")
		<li> <a href="/">Welcome Page</a> </li>
@stop

@section("content")

<h3>Sign up</h3>

{{ Form::open(array("url" => "/signup")) }}

	Email<br>
	{{ Form::text("email") }}<br><br>

	Password:<br>
	{{ Form::password("password") }}<br><br>

	{{ Form::submit("Submit") }}

{{ Form::close() }}
@stop
