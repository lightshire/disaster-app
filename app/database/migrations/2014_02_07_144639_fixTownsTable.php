<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixTownsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('towns', function($table)
		{
			$table->dropColumn('province_id');
			$table->integer('city_id');
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
		Schema::table('towns', function($table)
		{
			$table->integer('province_id');
			$table->dropColumn('city_id');
		});
	}

}
