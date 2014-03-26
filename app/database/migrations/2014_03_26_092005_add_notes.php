<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orders', function($table)
	    {
	        $table->string('order_notes', 255);
	        $table->string('inv_notes', 255);
	        $table->string('ass_notes', 255);
	        $table->string('sur_notes', 255);
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$table->dropColumn('order_notes');
		$table->dropColumn('inv_notes');
		$table->dropColumn('ass_notes');
		$table->dropColumn('sur_notes');
	}

}
