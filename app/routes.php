<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

// *************** Users ****************

Route::get('/signup',
	// view form for sign up
	// send to the user controller. use a filter
	array(
		"before" => "guest",
		"uses" => "UserController@getSignup"
	)
);

Route::post('/signup',
	array(
		"before" => "csrf",
		"uses" => "UserController@postSignup"
	)
);

Route::get('/login',
	array(
		"before" => "guest",
		"uses" => "UserController@getLogin"
	)
// form for log-in, if user signed in already skips to index
);

Route::post('/login',
	array(
		"before" => "csrf",
		"uses" => "UserController@postLogin"
	)
	// process log-in 
);

Route::get('/logout', function() {

	// log out
	Auth::logout();

	return Redirect::to("/");
});

// ************ DESTINATIONS ***********

Route::get('/destination', 
	array(
		"before" => "auth", 
		"uses" => "DestinationController@getDestination"
	)
	// show form for adding destination
);

Route::post('/destination',
	array(
		"before" => "csrf", 
		"uses" => "DestinationController@postDestination"
	)
	// process destination form
);

Route::post('/deleteDestination', 
	array(
		"before" => "csrf", 
		"uses" => "DestinationController@deleteDestination"
	)
	// process the removal form
);
// *************** Trips *******************

Route::get('/trip', 
	array(
		"before" => "auth",
		"uses" => "TripController@getTrip"
	)
);

Route::post('/trip', 
	array(
		"before" => "auth",
		"uses" => "TripController@postTrip"
	)
	// process trip
);

// ***************** Poll ********************

Route::get('/poll', 
	array(
		"before" => "auth", 
		"uses" => "PollController@getPoll"
	)
);

Route::post('/poll', 
	array(
		"before" => "auth",
		"uses" => "PollController@postPoll"
	)
	// process poll
);

Route::get("mysql-test", function() {

	# Print environment
	echo "Environment: ".App::environment()."<br>";

	# Use the DB component to select all the databases
	$results = DB::select("SHOW DATABASES;");

	# If the "Pre" package is not installed, you should output using print_r instead
	echo Paste\Pre::render($results);

});
