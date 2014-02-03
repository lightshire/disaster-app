<?php
	class SentryUsersSeeder extends Seeder
	{
		public function run()
		{
			DB::table('users')->delete();

			$user = Sentry::createUser(array(
					'email' 	=> 'admin@admin.com',
					'password' 	=> '1234',
					'activated' => true
				));

			$adminGroup = Sentry::findGroupByName('Super Administrators');
			$user->addGroup($adminGroup);

		
		}
	}