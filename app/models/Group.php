<?php
	class Group extends Eloquent {
		public function user()
		{
			// groups is in a one to many relationship with user
			return $this->hasMany("User");
		}
	}