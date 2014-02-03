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

			$group = Sentry::findGroupByName('Provincial Official');
			$user->addGroup($group);

			$province = Province::where('province_name','BENGUET')->first();
			
			$location = new Location;
			$location->user_id = $user->id;
			$location->province_id = $province->id;
			$location->save();
		}
	}