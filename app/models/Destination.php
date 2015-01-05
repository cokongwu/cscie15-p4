<?php 
	class Destination extends Eloquent{

		public function trip(){
			// destination is in a one to many relationship
			// with trip
			return $this->hasMany("Trip");
		}

		public function scopeSelectOpts(){
			$selectVals[''] = "Please Select";
			$selectVals += $this->lists("name", "id");
			return $selectVals;
		}

		public function scopeDisplay(){
			$showVals = "<h3>The current destinations are</h3>\n";
			$showVals = $showVals."<table>";
			foreach($this->all() as $destination){
				$showVals = $showVals."<tr>\n\t<td>Name: ".$destination->name."</td>\n";
				$showVals = $showVals."\t<td>Airport Code: ".$destination->airport_code."</td>\n";
				$showVals = $showVals."\t<td>Image: ".$destination->image."</td>\n";
				$showVals = $showVals."\t<td>Conversion Rate:".$destination->conv_rate."</td>\n</tr>";
			}
			$showVals = $showVals."</table>";
			return $showVals;
		}
	}
