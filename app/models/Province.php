<?php
	class Province extends Eloquent
	{
		public $timestamps = false;
		public $softDeletes = false;

		public function cities()
		{
			return $this->hasMany('City');
		}

		public function region()
		{
			return $this->belongsTo('Region');
		}
	}