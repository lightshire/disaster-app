<?php
	class Province extends Eloquent
	{
		public $timestamps = false;
		public $softDeletes = false;

		public function towns()
		{
			return $this->hasMany('Town');
		}

		public function region()
		{
			return $this->belongsTo('Region');
		}
	}