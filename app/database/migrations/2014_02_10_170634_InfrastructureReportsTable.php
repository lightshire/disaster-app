<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InfrastructureReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('infrastructure_report', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('infrastructure_id');
			$table->integer('report_id');
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
		Schema::drop('InfrastructureReports');
	}

}
