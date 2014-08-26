<?php

use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function($table)
		{
			$table->increments('id');
			$table->string('barcode')->unique();
			$table->string('serialnumber')->nullable();
			$table->string('description')->nullable();
			$table->string('name')->nullable();
			$table->string('location')->nullable();
			$table->date('datepurchased');
			$table->date('dateexpired');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('items');
	}


}