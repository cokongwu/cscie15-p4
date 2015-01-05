<?php
class Trip extends Eloquent{
	public function destination(){
		// each trip is in a many to one relationship with
		// each destination
		return $this->belongsTo("Destination");
	}

	public function polls(){
	//	return $this->belongsToMany("Polls");
	}

	public function scopeSelectOpts(){
		$selectVals[''] = "Please Select";
		$selectVals += $this->lists("id", "id");
		return $selectVals;
	}

	public function scopeDisplay(){
		$showVals = "<h3>The current trips are</h3>\n";
		$showVals = $showVals."<table>";
		foreach($this->with("destination")->get() as $trip){
			$showVals = $showVals."<tr>\n\t<td>".$trip->id."</td>\n";
			$showVals = $showVals."\t<td>Destination: ".
				$trip->destination->name."</td>\n";
			$showVals = $showVals."\t<td>Departs: ".$trip->depart."</td>\n";
			$showVals = $showVals."\t<td>Returns: ".$trip->return."</td>\n</tr>";
		}
		$showVals = $showVals."</table>";
		return $showVals;
	}

}
