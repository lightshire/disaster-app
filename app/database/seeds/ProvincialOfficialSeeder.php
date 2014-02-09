<?php
	class ProvincialOfficialSeeder extends Seeder
	{
		public function run()
		{
			$user = User::where('email','baguio@baguio.com')->first();

			if($user) {
				$user->delete();
			}

			$user = Sentry::createUser(array(
					'email' 		=> 'baguio@baguio.com',
					'password' 		=> 'baguio1234',
					'first_name' 	=> 'Mayor',
					'last_name' 	=> 'Mayor',
					'activated' 	=> true
				));

			$group = Sentry::findGroupByName('Mayoral Official');
			$user->addGroup($group);

			$city = City::where('city_name','Baguio')->first();
			
			$location = new Location;
			$location->user_id = $user->id;
			$location->city_id = $city->id;
			$location->save();
		}
	}