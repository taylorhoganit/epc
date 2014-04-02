<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('inv_num', 255);
			$table->string('address', 255);
			$table->string('postcode', 255);
			$table->string('date', 255);
			$table->string('inv_address', 255);
			$table->string('inv_postcode', 255);
			$table->string('inv_net', 255);
			$table->string('inv_vat', 255);
			$table->string('inv_tot', 255);
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
		Schema::drop('invoices');
	}

}
