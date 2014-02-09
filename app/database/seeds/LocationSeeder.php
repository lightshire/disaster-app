<?php
	class LocationSeeder extends Seeder
	{
		public function run()
		{
			DB::table('regions')->delete();
			DB::table('provinces')->delete();
			DB::table('towns')->delete();
			DB::table('cities')->delete();
			$regions = array(
					'CAR',
					'REGION I',
					'REGION II',
					'REGION III',
					'REGION IV',
					'REGION V',
					'REGION VI',
					'REGION VII',
					'REGION VIII',
					'REGION IX',
					'REGION X'
				);

			for($i = 0; $i < count($regions); $i++) {
				$region = new Region;
				$region->region = $regions[$i];
				$region->save();
			}

			$region = Region::where('region','CAR')->first();

			$provinces = array(
					'BENGUET'
				);

			for($i = 0; $i < count($provinces); $i++) {
				$province = new Province;
				$province->province_name = $provinces[$i];
				$province->region_id	 = $region->id;
				$province->save();
			}

			$province = Province::where('province_name','BENGUET')->first();

			$city = new City;
			$city->city_name 	= "Baguio";
			$city->province_id 	= $province->id;
			$city->save();


			$towns = array(
					'Gibraltar',
					'Pacdal',
					'Session Rd',
					'Magsasaysay',
					'Bonifacio',
					'Rimando',
					'Trancoville',
					'Aurora Hill'
				);

			for($i = 0; $i < count($towns); $i++) {
				$town = new Town;
				$town->town_name 	= $towns[$i];
				$town->city_id	 	= $city->id;
				$town->save(); 
			}
		}
	}