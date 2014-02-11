<?php
	class SentryGroupSeeder extends Seeder 
	{
		public function run()
		{
			DB::table('groups')->delete();
			DB::table('users_groups')->delete();

			/*
			 	Sentry Group
			 	-------------------------------/
			 	Super Administrator
			 */

		 	Sentry::createGroup(array(
		 			'name' 			=> 'Super Administrators',
		 			'permissions'	=> array(
		 					'system' => 1
		 				)
		 		));

		 	/*
				Sentry Group
				-------------------------------/
				National Offical
		 	*/

			Sentry::createGroup(array(
					'name' 			=> 'National Official',
					'permissions' 	=> array(
							'system.reports',
							'system.concerns' 			=> 1,
							'system.users.provincial'  	=> 1,
							'system.national' 			=> 1
						)
				));

			/*
				Sentry Group
				-------------------------------/
				Provincial Offical
			*/

			Sentry::createGroup(array(
					'name' 			=> 'Provincial Official',
					'permissions' 	=> array(
							'system.reports.summarized'  		=> 1,
							'system.reports.read'  				=> 1,
							'system.reports.add'  				=> 1,
							'system.reports.delete'  			=> 1,
							'system.reports.update' 			=> 1,
							'system.concerns.summarized' 		=> 1,
							'system.concerns.read' 				=> 1,
							'system.conerns.delete' 			=> 1,
							'system.concerns.update' 			=> 1,
							'system.concerns.add' 				=> 1,
							'system.users.mayoral'				=> 1,
							'system.provincial'					=> 1
						
						)
				));

			/*
				Sentry Group
				------------------------------/
				Mayoral Official
			*/

			Sentry::createGroup(array(
					'name' 			=> 'Mayoral Official',
					'permissions' 	=> array(
							'system.reports.summarized.mayoral'  	=> 1,
							'system.reports.read' 					=> 1,
							'system.reports.add' 					=> 1,
							'system.reports.delete' 				=> 1,
							'system.reports.update' 				=> 1,
							'system.concerns.summarized.mayoral' 	=> 1,
							'system.concerns.read' 					=> 1,
							'system.conerns.delete' 				=> 1,
							'system.concerns.update' 				=> 1,
							'system.concerns.add' 					=> 1,
							'system.users.mayoral' 				=> 1
						)
				));

			/*
				Sentry Group
				------------------------------/
				Barangay Offical
			*/

			Sentry::createGroup(array(
					'name' 			=> 'Barangay Official',
					'permissions' 	=> array(
							'system.reports.read' 		=> 1,
							'system.reports.add' 		=> 1,
							'system.reports.delete'	 	=> 1,
							'system.reports.update' 	=> 1,
							'system.concerns.read' 		=> 1,
							'system.conerns.delete' 	=> 1,
							'system.concerns.update' 	=> 1,
							'system.concerns.add' 		=> 1,
							'system.barangay' 			=> 1
						)
			));


		}
	}