<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DummyWebservices extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('test_webservices', function(Blueprint $table)
		{
			$table->increments('d_id');
			$table->string('daily_date_time');
			$table->integer('user_id');
			$table->integer('no_user_registered');
			$table->integer('iphone_download');
			$table->integer('android_download');
			$table->integer('black_berry_download');
			$table->integer('daily_sale');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->integer('create_by');
			$table->integer('manage_by');


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
		Schema::drop('users');
	}

}
