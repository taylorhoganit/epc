<?php

class PermissionsController extends \BaseController {
	protected $layout = "layouts.main";
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$permissions = Permission::all();
		$this->layout->content = View::make('permissions.index', compact('permissions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$permission = Permission::find($id);
		$this->layout->content = View::make('permissions.edit', compact('permission'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$permission = Permission::find($id);
		// Order Permissions
		$permission->order_date = Input::get('order_date');
		$permission->epc_name = Input::get('epc_name');
		$permission->epc_tel = Input::get('epc_tel');
		$permission->epc_email = Input::get('epc_email');
		$permission->address = Input::get('address');
		$permission->postcode = Input::get('postcode');
		$permission->epc_status = Input::get('epc_status');
		$permission->agent = Input::get('agent');
		$permission->assessor = Input::get('assessor');
		$permission->type = Input::get('type');
		$permission->building_type = Input::get('building_type');
		$permission->net_cost = Input::get('net_cost');
		$permission->floor_plans = Input::get('floor_plans');
		$permission->size = Input::get('size');
		$permission->size_type = Input::get('size_type');
		$permission->stories = Input::get('stories');
		$permission->time = Input::get('time');
		$permission->doc1 = Input::get('doc1');
		$permission->doc2 = Input::get('doc2');
		$permission->doc3 = Input::get('doc3');
		$permission->doc4 = Input::get('doc4');
		$permission->doc5 = Input::get('doc5');
		// Invoice Permissions
		$permission->inv_num = Input::get('inv_num');
		$permission->inv_net = Input::get('inv_net');
		$permission->inv_vat = Input::get('inv_vat');
		$permission->inv_tot = Input::get('inv_tot');
		$permission->inv_date = Input::get('inv_date');
		$permission->inv_status = Input::get('inv_status');
		$permission->inv_name = Input::get('inv_name');
		$permission->inv_email = Input::get('inv_email');
		$permission->inv_address = Input::get('inv_address');
		$permission->inv_postcode = Input::get('inv_postcode');
		$permission->inv_due_date = Input::get('inv_due_date');
		$permission->inv_paid_date = Input::get('inv_paid_date');
		$permission->method = Input::get('method');
		// Assessor Invoice Ref Permissions
		$permission->ass_inv_ref = Input::get('ass_inv_ref');
		$permission->ass_inv_amount = Input::get('ass_inv_amount');
		$permission->ass_inv_vat = Input::get('ass_inv_vat');
		$permission->ass_inv_tot = Input::get('ass_inv_tot');
		$permission->ass_inv_date = Input::get('ass_inv_date');
		$permission->ass_inv_status = Input::get('ass_inv_status');
		$permission->ass_inv_due_date = Input::get('ass_inv_due_date');
		$permission->ass_inv_paid_date = Input::get('ass_inv_paid_date');
		// Survey Appointment Details Permissions
		$permission->sur_date = Input::get('sur_date');
		$permission->sur_time = Input::get('sur_time');
		$permission->sur_arr = Input::get('sur_arr');
		$permission->sur_email = Input::get('sur_email');
		$permission->sur_address = Input::get('sur_address');
		$permission->sur_postcode = Input::get('sur_postcode');
		$permission->save();

		// redirect
		Session::flash('message', 'Successfully updated Permissions');
		return Redirect::to('permissions');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}