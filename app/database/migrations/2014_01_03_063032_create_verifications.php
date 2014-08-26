<?php

use Illuminate\Database\Migrations\Migration;

class CreateVerifications extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('verifications', function($table)
		{
			$table->increments('id');
			$table->string('item_id');
			$table->string('status');
			$table->date('dateout');
			$table->date('datein');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('verifications');
	}

}