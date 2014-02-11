<?php
	class Demographic extends Eloquent
	{
		public $timestamps 	= false;
		public $softDeletes = false;

		public function totalPop()
		{
			return $this->male_count + $this->female_count;
		}
	}