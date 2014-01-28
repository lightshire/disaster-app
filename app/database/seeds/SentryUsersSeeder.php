<?php
	class SentryUsersSeeder extends Seeder
	{
		public function run()
		{
			DB::table('users')->delete();

			$user = Sentry::createUser(array(
					'email' 	=> 'gian.santillan@globalwebdynamics.co',
					'password' 	=> 'giansantillan18',
					'activated' => true
				));

			$adminGroup = Sentry::findGroupByName('Super Administrators');
			$user->addGroup($adminGroup);
		}
	}