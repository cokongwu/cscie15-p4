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
		$depart = date("d-m-Y", strtotime(Input::get("depart")));
		$return = date("d-m-Y", strtotime(Input::get("return")));
		$check = Trip::whereId("$destination")
			->whereDepart("$depart")->whereReturn("$return")->get();

		$temp = Destination::find($destination);
		$trip = new Trip;
		$trip->depart = "$depart";
		$trip->return = "$return";
		$trip->destination()->associate($temp);

		// try/catch for the save
		try {
			$trip->save();
		}
		catch (Exception $e) {
			return Redirect::intended("/trip")->with("flash_message", 
				"$trip->destination destination, Failed to add trip; please try again.");
		}

		return Redirect::intended("/trip")->with("flash_message",
			"Great success!! Trip added.");
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