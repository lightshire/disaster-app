<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPopulationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('demographics', function($table) 
		{
			$table->increments('id');
			$table->integer('male_count');
			$table->integer('female_count');
			$table->integer('family_count');
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
		Schema::drop('demographics');
	}

}
