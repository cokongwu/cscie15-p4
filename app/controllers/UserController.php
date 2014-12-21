<?php 

class UserController extends BaseController {

	public function __construct() {
//		$this->beforeFilter("auth");
	}

	public function getSignup() {
		return View::make("signup");
	}

	public function postSignup() {
		$user = new User;
		$user->email = Input::get("email");
		$user->password = Hash::make(Input::get("password"));
		$user->group = 2;

		// Try/catch for adding user
		try {
			$user->save();
		}
		catch (Exception $e) {
			return Redirect::to("/signup")->with("flash_message", 
				"Sign up failed; please try again.")->withInput();
		}

		// Log the user in
		Auth::login($user);

		return Redirect::to("/")->with("flash_message", 
			"Welcome to Buddy Planner!");
	}

	public function getLogin() {
		return View::make("login");
	}

	public function postLogin() {
		$credentials = Input::only("email", "password");

		if (Auth::attempt($credentials, $remember = true)) {
			return Redirect::intended("/")->with("flash_message", 
				"Welcome Back!");
		}
		else {
			return Redirect::to("/login")->with("flash_message", 
				"Log in failed; please try again.");
		}

		return Redirect::to("login");
	}

}