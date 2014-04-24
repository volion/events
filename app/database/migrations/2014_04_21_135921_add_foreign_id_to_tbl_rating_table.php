<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignIdToTblRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tbl_rating', function(Blueprint $table)
		{
			$table->index('id');
			$table->foreign('id')->references('pk')->on('tbl_event')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tbl_rating', function(Blueprint $table)
		{
			$table->dropForeign('tbl_rating_id_foreign');
			$table->dropIndex('tbl_rating_id_index');
		});
	}

}
