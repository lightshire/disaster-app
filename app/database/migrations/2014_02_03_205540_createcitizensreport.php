<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createcitizensreport extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('concerns', function($table) {
			$table->increments('id');
			$table->string('full_name');
			$table->string("message");
			$table->integer("town_id");
			$table->string("image_url");
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
		Schema::drop('concerns');
	}

}
