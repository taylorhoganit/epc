<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotesPermissions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('permissions', function($table)
	    {
	        $table->boolean('order_notes');
	        $table->boolean('inv_notes');
	        $table->boolean('ass_notes');
	        $table->boolean('sur_notes');
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
