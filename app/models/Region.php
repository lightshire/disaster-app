<?php
	class Region extends Eloquent
	{
		public $timestamps 		= false;
		protected $softDeletes	= false;

		public function provinces()
		{
			return $this->hasMany('Province');
		}
	}