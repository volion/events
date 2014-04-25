<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblEventTblVisitorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_event_tbl_visitor', function(Blueprint $table)
		{
			$table->increments('pk');
			$table->integer('tbl_event_id')->unsigned()->index();
			$table->foreign('tbl_event_id')->references('pk')->on('tbl_event')->onDelete('cascade');
			$table->integer('tbl_visitor_id')->unsigned()->index();
			$table->foreign('tbl_visitor_id')->references('pk')->on('tbl_visitor')->onDelete('cascade');
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
		Schema::drop('tbl_event_tbl_visitor');
	}

}
