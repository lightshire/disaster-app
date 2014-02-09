<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsModel extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('reports', function($table)
		{
			$table->increments('id');
			$table->integer('town_id');
			$table->integer('disaster_id');
			$table->string("infrastructure_type");
			$table->string("families_affected");
			$table->string("image_url");
			$table->double('cost');
			$table->text("description");
			$table->string("status");
			$table->timestamps();
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
		Schema::drop('reports');
	}

}
