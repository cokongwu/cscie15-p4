<?php
class Trip extends Eloquent{
	public function destination(){
		// each trip is in a many to one relationship with
		// each destination
		return $this->belongsTo("Destination");
	}

	public function polls(){

	}

	public function scopeSelectOpts(){
		$selectVals[''] = "Please Select";
		$selectVals += $this->lists("destination", "id");
		return $selectVals;
	}

	public function scopeDisplay(){
		$showVals = "<h3>The current trips are</h3>\n";
		$collection = $this->all();
		$showVals = $showVals."<table>";
		foreach($collection->all() as $trip){
			$showVals = $showVals."<tr>\n\t<td>Destination: ".$trip->destination."</td>\n";
			$showVals = $showVals."\t<td>Departs: ".$trip->depart."</td>\n";
			$showVals = $showVals."\t<td>Returns: ".$trip->return."</td>\n</tr>";
		}
		$showVals = $showVals."</table>";
		return $showVals;
	}

}
