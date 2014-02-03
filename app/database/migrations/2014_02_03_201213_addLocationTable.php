<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('locations', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unique();
			$table->integer('region_id');
			$table->integer('province_id');
			$table->integer('town_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('locations');
	}

}
