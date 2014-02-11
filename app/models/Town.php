<?php
	class Town extends Eloquent
	{
		public $timestamps = false;
		public $softDeletes = false;
		
		public function city() 
		{
			return $this->belongsTo('City');
		}

		public function demographics()
		{
			return $this->hasOne('Demographic');
		}

		public static function findByName($name, $city_id)
		{
			return Town::where('town_name')->where('city_id', $city_id)->first();
		}

		public static function createOrFind($name, $city_id) 
		{
			$town = Town::findByName($name, $city_id);

			if(!$town) {
				$town = new Town;
				$town->town_name 	= $name;
				$town->city_id 		= $city_id;
				$town->save(); 
			}

			return $town;
		}



		public function addDemographic($maleCount, $femaleCount, $familyCount) 
		{
			$demo = $this->demographics;

			if(!$demo) {
				$demo 			= new Demographic;
				$demo->town_id 	= $this->id;
			}
			$demo->male_count 	= $maleCount;
			$demo->female_count	= $femaleCount;
			$demo->family_count = $familyCount;
			$demo->save();

			return $demo;
		}
	}