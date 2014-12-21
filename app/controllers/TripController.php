<?php 

class TripController extends BaseController {
	
	public function getTrip(){
		$tripSelect = Trip::selectOpts();
		$destSelect = Destination::selectOpts();
		$tripDisplay = Trip::display();
		return View::make("trip", compact("tripSelect", "destSelect", 
			"tripDisplay"));
	}

	public function postTrip(){
		$destination = Input::get("destination");
		$depart = Input::get("depart");
		$return = Input::get("return");
		$check = Trip::whereId("$destination")
			->whereDepart("$depart")->whereReturn("$return")->get();
		if($check != "[]") {
			updateTrip();
			return Redirect::intended("/trip")->with("flash_message",
				"Trip updated successfully");
		}

		$trip = new Trip;
		$trip->depart = $depart;
		$trip->return = $return;
		$temp = Destination::find($destination);


		// try/catch for the save
		try {
 			$trip->destination()->associate($temp);
			$trip->save();
		}
		catch (Exception $e) {
			return Redirect::intended("/trip")->with("flash_message", 
				"Failed to add trip; please try again.");
		}

		return Redirect::intended("/trip")->with("flash_message",
			"Great success!! Trip added.");
	}

	private function updateTrip(){
		
	}

	public function deleteTrip(){
		$id = Input::get("$id");
		Trip::whereId($id)->delete();
	}

	private function parseDate($date){
		$parsedDate = $date[0].$date[1]."-".$date[3].$date[4]."-";
		$parsedDate = $parsedDate.$date[6].$date[7].$date[8].$date[9];
		return $parsedDate;
	}
}