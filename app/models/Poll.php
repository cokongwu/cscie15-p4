<?php

class Poll extends Eloquent
{
	public function trips(){
		return $this->hasMany("");
	}

	public function scopeSelectOpts(){
		$selectVals[''] = "Please Select";
		$selectVals += $this->lists("id", "id");
		return $selectVals;
	}

	public function scopeDisplay(){
		$showVals = "<h3>The current polls are</h3>\n";
		$collection = $this->all();
		$showVals = $showVals."<table>";
		foreach($collection->all() as $poll){
			$showVals = $showVals."<tr>\n\t<td>Poll #: ".$poll->id."</td>\n";
			$showVals = $showVals."\t<td>Trip 1: ".$poll->trip1."</td>\n";
//			$showVals = $showVals."\t<td>Tally : ".$poll->tally1."</td>\n";
			$showVals = $showVals."\t<td>Trip 2: ".$poll->trip2."</td>\n";
//			$showVals = $showVals."\t<td>Tally : ".$poll->tally2."</td>\n";
			$showVals = $showVals."\t<td>Trip 3: ".$poll->trip3."</td>\n";
//			$showVals = $showVals."\t<td>Tally : ".$poll->tally3."</td>\n";
			$showVals = $showVals."\t<td>Trip 4: ".$poll->trip4."</td>\n";
//			$showVals = $showVals."\t<td>Tally : ".$poll->tally4."</td>\n";
			$showVals = $showVals."\t<td>Trip 5: ".$poll->trip5."</td>\n";
//			$showVals = $showVals."\t<td>Tally : ".$poll->tally5."</td>\n</tr>";
		}
		$showVals = $showVals."</table>";
		return $showVals;
	}

}