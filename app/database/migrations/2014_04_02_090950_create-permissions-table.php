<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function($table)
		{
		    $table->increments('id');
		    $table->string('user_type', 255);
		    $table->boolean('order_date');
		    $table->boolean('epc_name');
		    $table->boolean('epc_tel');
		    $table->boolean('epc_email');
		    $table->boolean('address');
		    $table->boolean('postcode');
		    $table->boolean('epc_status');
		    $table->boolean('agent');
		    $table->boolean('assessor');
		    $table->boolean('type');
		    $table->boolean('building_type');
		    $table->boolean('net_cost');
		    $table->boolean('floor_plans');
		    $table->boolean('size');
		    $table->boolean('size_type');
		    $table->boolean('stories');
		    $table->boolean('time');
		    $table->boolean('doc1');
		    $table->boolean('doc2');
		    $table->boolean('doc3');
		    $table->boolean('doc4');
		    $table->boolean('doc5');
		    $table->boolean('inv_num');
		    $table->boolean('inv_net');
		    $table->boolean('inv_vat');
		    $table->boolean('inv_tot');
		    $table->boolean('inv_date');
		    $table->boolean('inv_status');
		    $table->boolean('inv_name');
		    $table->boolean('inv_email');
		    $table->boolean('inv_address');
		    $table->boolean('inv_postcode');
		    $table->boolean('inv_due_date');
		    $table->boolean('inv_paid_date');
		    $table->boolean('method');
		    $table->boolean('ass_inv_ref');
		    $table->boolean('ass_inv_amount');
		    $table->boolean('ass_inv_vat');
		    $table->boolean('ass_inv_tot');
		    $table->boolean('ass_inv_date');
		    $table->boolean('ass_inv_status');
		    $table->boolean('ass_inv_due_date');
		    $table->boolean('ass_inv_paid_date');
		    $table->boolean('sur_date');
		    $table->boolean('sur_time');
		    $table->boolean('sur_arr');
		    $table->boolean('sur_email');
		    $table->boolean('sur_address');
		    $table->boolean('sur_postcode');
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
		Schema::drop('permissions');
	}

}
