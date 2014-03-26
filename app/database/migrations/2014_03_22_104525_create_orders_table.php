<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			// Order
			$table->string('order_date', 255);
			$table->string('epc_name', 255);
			$table->string('epc_tel', 255);
			$table->string('epc_email', 255);
		    $table->string('address', 255);
		    $table->string('postcode', 255);	
		    $table->string('epc_status', 255);
		    $table->string('agent', 255);
		    $table->string('assessor', 255);
		    $table->string('type', 255);
		    $table->string('building_type', 255);
		    $table->string('net_cost', 255);
		    $table->string('floor_plans', 255);
		    $table->string('size', 255);
		    $table->string('size_type', 255);
		    $table->string('stories', 255);
		    $table->string('time', 255);
		    $table->string('doc1', 255);
		    $table->string('doc2', 255);
		    $table->string('doc3', 255);
		    $table->string('doc4', 255);
		    $table->string('doc5', 255);
		    // Invoice
		    $table->string('inv_num', 255);
		    $table->string('inv_net', 255);
		    $table->string('inv_vat', 255);
		    $table->string('inv_tot', 255);
		    $table->string('inv_date', 255);
		    $table->string('inv_status', 255);
		    $table->string('inv_name', 255);
		    $table->string('inv_email', 255);
		    $table->string('inv_address', 255);
		    $table->string('inv_postcode', 255);
		    $table->string('inv_due_date', 255);
		    $table->string('inv_paid_date', 255);
		    $table->string('method', 255);
		    // Assessor
		    $table->string('ass_inv_ref', 255);
		    $table->string('ass_inv_amount', 255);
		    $table->string('ass_inv_vat', 255);
		    $table->string('ass_inv_tot', 255);
		    $table->string('ass_inv_date', 255);
		    $table->string('ass_inv_status', 255);
		    $table->string('ass_inv_due_date', 255);
		    $table->string('ass_inv_paid_date', 255);
		    // Survey
		    $table->string('sur_date', 255);
		    $table->string('sur_time', 255);
		    $table->string('sur_arr', 255);
		    $table->string('sur_email', 255);
		    $table->string('sur_address', 255);
		    $table->string('sur_postcode', 255);
		    // Commissions Soon	
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
		Schema::drop('orders');
	}

}
