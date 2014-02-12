<?php
	class Location extends Eloquent
	{
		public $timestamps = false;
		public $softDeletes = false;

		public function town()
		{
			return $this->belongsTo('Town');
		}

		public function city()
		{
			return $this->belongsTo('City');
		}
	}