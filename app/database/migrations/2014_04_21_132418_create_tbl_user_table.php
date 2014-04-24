<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_user', function(Blueprint $table)
		{
			$table->increments('pk');
			$table->string('username', 150);
			$table->string('email', 150);
			$table->string('password', 200);
			$table->dateTime('date_sign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_user');
	}

}
