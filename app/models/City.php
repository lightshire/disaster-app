<?php
	class City extends Eloquent
	{
		public $softDeletes = false;
		public $timestamps  = false;

		public function province()
		{
			return $this->belongsTo('Province');
		}

		public function towns()
		{
			return $this->hasMany('Town');
		}
	}