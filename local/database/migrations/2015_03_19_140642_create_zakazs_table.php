<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZakazsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('zakazs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('body');
			$table->string('phone');
			$table->string('comment');
			$table->enum('status',['new','sended','finished']);
			$table->string('ip');
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
		Schema::drop('zakazs');
	}

}
