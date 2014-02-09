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

		public static function findByName($name, $province_id) 
		{
			return City::where('city_name', $name)->where('province_id', $province_id)->first();
		}

		public static function createOrFind($name, $province_id) 
		{
			$city = City::findByName($name, $province_id);

			if(!$city) {
				$city = new City;
				$city->city_name 	= $name;
				$city->province_id	= $province_id;
				$city->save();
			}

			return $city;
		}
	}