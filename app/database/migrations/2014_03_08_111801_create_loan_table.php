<?php

use Illuminate\Database\Migrations\Migration;

class CreateLoanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loans', function($table){
			$table->increments('id');
			$table->integer('item_id');
			$table->string('name');
			$table->string('department');
			$table->date('date_loaned');
			$table->date('date_received');
			$table->date('date_returned');
			$table->text('remarks');
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
		Schema::drop('loans');
	}

}