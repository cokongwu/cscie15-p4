<!DOCTYPE html>
<html>
<head>
	<title>
		@yield("title")
	</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{ asset('./css/mycss.css') }}">
	@yield("styles")
</head>
<body>
<div id="main">
<div id="header">
<h1>Buddy Travel Planner</h1>
</div>
<div id="catNav">
	<ul>
@yield("navigation")
		<li>
@if(Auth::check())
			<a href="/logout">Log out {{ Auth::user()->email; }}</a>
@else
			<a href="/signup">Sign up</a> or <a href="/login">Log in</a>
@endif
		</li>
	</ul>
</div>
<div id="options">
@yield("options")
</div>
<div id="content">
@if(Session::get("flash_message"))
	<div class="flash_message">{{ Session::get("flash_message") }}</div>
@endif
@yield("content")
</div>
<hr></div>
</body>
</html>
