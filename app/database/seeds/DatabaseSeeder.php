<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('LocationSeeder');
		$this->call('SentryGroupSeeder');
		$this->call('SentryUsersSeeder');
		$this->call("BarangayOfficialSeeder");
		$this->call("ProvincialOfficialSeeder");
	}

}