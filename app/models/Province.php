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

		public static function findByName($name, $region_id) 
		{
			return Province::where('province_name', $name)->where('region_id', $region_id)->first();
		}

		public static function createOrFind($name, $region_id = 0)
		{
			$province = Province::findByName($name, $region_id);
			if(!$province) {
				$province = new Province;
				$province->province_name 	= $name;
				$province->region_id 		= $region_id;
				$province->save();
			}

			return $province;
		}
	}