<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_event', function(Blueprint $table)
		{
			$table->increments('pk');
			$table->integer('id')->unsigned();
			$table->dateTime('date');
			$table->string('start', 150);
			$table->mediumText('comment');
			$table->dateTime('date_created');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_event');
	}

}
