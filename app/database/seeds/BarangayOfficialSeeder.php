<?php
	class BarangayOfficialSeeder extends Seeder
	{
		public function run()
		{
			$user = User::where('email','aurora@barangay.com')->first();

			if($user) {
				$user->delete();
			}

			$user = Sentry::createUser(array(
					'email' 		=> 'aurora@barangay.com',
					'password' 		=> 'aurora1234',
					'first_name' 	=> 'Barangay',
					'last_name' 	=> 'Captain',
					'activated' 	=> true 
				));

			$group = Sentry::findGroupByName('Barangay Official');
			$user->addGroup($group);


			$town = Town::where('town_name','Aurora Hill')->first();
			$location = new Location;
			$location->user_id = $user->id;
			$location->town_id = $town->id;
			$location->save();
			
		}
	}