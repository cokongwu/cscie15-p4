<?php 

class PollController extends BaseController {
	
	public function getPoll(){
		$tripSelect = Trip::selectOpts();
		$pollSelect = Poll::selectOpts();
		$pollDisplay = Poll::display();
		return View::make("poll", compact("tripSelect", "pollSelect", 
			"pollDisplay"));
	}

	public function postPoll(){
		$poll = new Poll;
		$poll->trip1 = Input::get("trip1");
		$poll->trip2 = Input::get("trip2");
		$poll->trip3 = Input::get("trip3");
		$poll->trip4 = Input::get("trip4");
		$poll->trip5 = Input::get("trip5");

		// try/catch for the save
		try {
 			$poll->trip1()->associate($trip1);
 			$poll->trip2()->associate($trip2);
 			$poll->trip3()->associate($trip3);
 			$poll->trip4()->associate($trip4);
 			$poll->trip5()->associate($trip5);
			$poll->save();
		}
		catch (Exception $e) {
			return Redirect::intended("/poll")->with("flash_message", 
				"Failed to add poll; please try again.");
		}

		return Redirect::intended("/poll")->with("flash_message",
			"Great success!! Poll added.");
	}

	public function deletePoll(){
		$id = Input::get("$id");
		Poll::whereId($id)->delete();
	}
}