<?php 

class TripController extends BaseController {
	
	public function __construct() {
        $this->beforeFilter('auth');
    }

    public function getTrip(){
		$tripSelect = Trip::selectOpts();
		$destSelect = Destination::selectOpts();
		$tripDisplay = Trip::display();
		return View::make("trip", compact("tripSelect", "destSelect", 
			"tripDisplay"));
	}

	public function postTrip(){
		$destination = Input::get("destination");
		$depart = date("Y-m-d", strtotime(Input::get("depart")));
		$return = date("Y-m-d", strtotime(Input::get("return")));
		$check = Trip::whereId("$destination")
			->whereDepart("$depart")->whereReturn("$return")->get();

		$temp = Destination::find($destination);
		$trip = new Trip;
		if($depart < $return){
			$trip->depart = $depart;
			$trip->return = $return;
		}
		else{
			$trip->depart = $return;
			$trip->return = $depart;
		}
		$trip->destination()->associate($temp);

		// try/catch for the save
		try {
			$trip->save();
		}
		catch (Exception $e) {
			return Redirect::intended("/trip")->with("flash_message", 
				"$trip->destination destination, \n Exception: $e,\n Failed to add trip; please try again.");
		}

		return Redirect::intended("/trip")->with("flash_message",
			"depart: $depart, return: $return Great success!! Trip added.");
	}

	public function deleteTrip(){
		$id = Input::get("trip");
		Trip::whereId("$id")->delete();

		return Redirect::intended("/trip")->with("flash_message",
			"Trip removed.");
	}
}