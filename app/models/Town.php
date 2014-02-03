<?php
	class Town extends Eloquent
	{
		public $timestamps = false;
		public $softDeletes = false;
		
		public function province() 
		{
			return $this->belongsTo('Province');
		}
	}