<?php

class DestinationController extends BaseController {

	public function __construct() {
        $this->beforeFilter('auth');
    }

    public function getDestination()
	{
		$destSelect = Destination::selectOpts();
		$destDisplay = Destination::display();
		return View::make("destination", compact("destSelect", "destDisplay"));
	}

	private function editDestination(){
		$item = Destination::whereName(Input::get("name"))
			->whereAirportCode(Input::get("airport_code"))->first();
		$item->image = Input::get("image");
		try {
			$item->save();
		}
		catch (Exception $e){
			return Redirect::intended("/destination")->with("flash_message", 
				"Failed to update destination; please try again.");
		}
	}

	public function postDestination()
	{
		// if destination already exists, use the edit function
		$name = Input::get("name");
		$code = Input::get("airport_code");
		$check = Destination::whereName("$name")
			->whereAirportCode("$code")->get();
		if($check != "[]"){
			$this->editDestination();
			return Redirect::intended("/destination")->with("flash_message",
				"Destination updated successfully");
		}

		$destination = new Destination;
		$destination->name = Input::get("name");
		$destination->airport_code = Input::get("airport_code");
		$destination->image = Input::get("image");

		// try catch for adding
		try {
			$destination->save();
		}
		catch (Exception $e) {
			return Redirect::intended("/destination")->with("flash_message", 
				"Failed to add destination; please try again.");
		}

		return Redirect::intended("/destination")->with("flash_message", 
			"Destination added successfully.");
	}

	public function deleteDestination()
	{
		$id = Input::get("destination");
		Destination::whereId("$id")->delete();

		return Redirect::intended("/destination")->with("flash_message",
			"Destination removed.");
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}
}