<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignIdToTblEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tbl_event', function(Blueprint $table)
		{
			$table->index('id');
			$table->foreign('id')->references('pk')->on('tbl_user')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tbl_event', function(Blueprint $table)
		{
			$table->dropForeign('tbl_event_id_foreign');
			$table->dropIndex('tbl_event_id_index');
		});
	}

}
