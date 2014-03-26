<?php

class OrdersController extends \BaseController {
	protected $layout = "layouts.main";
	/**
	 * Display a listing of orders
	 *
	 * @return Response
	 */

	public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	    $this->beforeFilter('auth');
	}
	
	public function index()
	{
		$orders = Order::all();
		$agents = User::all();	
		$this->layout->content = View::make('orders.index', compact('orders'), compact('agents'));
	}

	/**
	 * Show the form for creating a new order
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('orders.create');
	}

	/**
	 * Store a newly created order in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// $validator = Validator::make($data = Input::all(), Order::$rules);

		// if ($validator->fails())
		// {
		// 	return Redirect::back()->withErrors($validator)->withInput();
		// }

		// Order::create($data);

		// return Redirect::route('orders.index');

		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'order_date' => 'date',
			'epc_name'       => 'required',
			'epc_email' => 'email',
			'address'       => 'required',
			'postcode'       => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('orders/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$order = new Order;
			// Order Details
			$order->order_date       = Input::get('order_date');
			$order->epc_name       = Input::get('epc_name');
			$order->epc_tel       = Input::get('epc_tel');
			$order->epc_email      = Input::get('epc_email');
			$order->address       = Input::get('address');
			$order->postcode       = Input::get('postcode');
			$order->epc_status       = Input::get('epc_status');
			$order->agent       = Input::get('agent');
			$order->assessor       = Input::get('assessor');
			$order->type       = Input::get('type');
			$order->building_type       = Input::get('building_type');
			$order->net_cost       = Input::get('net_cost');
			$order->floor_plans      = Input::get('floor_plans');
			$order->size       = Input::get('size');
			$order->size_type       = Input::get('size_type');
			$order->stories      = Input::get('stories');
			$order->time       = Input::get('time');
			$order->doc1       = Input::get('doc1');
			$order->doc2       = Input::get('doc2');
			$order->doc3       = Input::get('doc3');
			$order->doc4       = Input::get('doc4');
			$order->doc5       = Input::get('doc5');
			// Invoice Details
			$order->inv_num       = Input::get('inv_num');
			$order->inv_net       = Input::get('inv_net');
			$order->inv_vat       = Input::get('inv_vat');
			$order->inv_tot       = Input::get('inv_tot');
			$order->inv_date       = Input::get('inv_date');
			$order->inv_status       = Input::get('inv_status');
			$order->inv_name       = Input::get('inv_name');
			$order->inv_email       = Input::get('inv_email');
			$order->inv_address       = Input::get('inv_address');
			$order->inv_postcode       = Input::get('inv_postcode');
			$order->inv_due_date       = Input::get('inv_due_date');	
			$order->inv_paid_date       = Input::get('inv_paid_date');
			$order->method       = Input::get('method');
			// Assessor Invoice Reference
			$order->ass_inv_ref       = Input::get('ass_inv_ref');
			$order->ass_inv_amount       = Input::get('ass_inv_amount');
			$order->ass_inv_vat       = Input::get('ass_inv_vat');
			$order->ass_inv_tot       = Input::get('ass_inv_tot');
			$order->ass_inv_date       = Input::get('ass_inv_date');
			$order->ass_inv_status       = Input::get('ass_inv_status');
			$order->ass_inv_due_date       = Input::get('ass_inv_due_date');
			$order->ass_inv_paid_date       = Input::get('ass_inv_paid_date');
			// Survey Appointment Details
			$order->sur_date       = Input::get('sur_date');
			$order->sur_time       = Input::get('sur_time');
			$order->sur_arr       = Input::get('sur_arr');
			$order->sur_email       = Input::get('sur_email');
			$order->sur_address       = Input::get('sur_address');
			$order->sur_postcode       = Input::get('sur_postcode');
			$order->save();

			// redirect
			Session::flash('message', 'Successfully created Order');
			return Redirect::to('orders');
		}
	}

	/**
	 * Display the specified order.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::findOrFail($id);

		$this->layout->content = View::make('orders.show', compact('order'));
	}

	/**
	 * Show the form for editing the specified order.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = Order::find($id);
		$agents = User::all();

		$this->layout->content = View::make('orders.edit', compact('order'), compact('agents'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// $order = Order::findOrFail($id);

		// $validator = Validator::make($data = Input::all(), Order::$rules);

		// if ($validator->fails())
		// {
		// 	return Redirect::back()->withErrors($validator)->withInput();
		// }

		// $order->update($data);

		// return Redirect::route('orders.index');

		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'order_date' => 'date',
			'epc_name'       => 'required',
			'epc_email' => 'email',
			'address'       => 'required',
			'postcode'       => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('orders/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store

			$order = Order::find($id);
			// Order Details
			$order->order_date       = Input::get('order_date');
			$order->epc_name       = Input::get('epc_name');
			$order->epc_tel       = Input::get('epc_tel');
			$order->epc_email      = Input::get('epc_email');
			$order->address       = Input::get('address');
			$order->postcode       = Input::get('postcode');
			$order->epc_status       = Input::get('epc_status');
			$order->agent       = Input::get('agent');
			$order->assessor       = Input::get('assessor');
			$order->type       = Input::get('type');
			$order->building_type       = Input::get('building_type');
			$order->net_cost       = Input::get('net_cost');
			$order->floor_plans      = Input::get('floor_plans');
			$order->size       = Input::get('size');
			$order->size_type       = Input::get('size_type');
			$order->stories      = Input::get('stories');
			$order->time       = Input::get('time');
			$order->doc1       = Input::get('doc1');
			$order->doc2       = Input::get('doc2');
			$order->doc3       = Input::get('doc3');
			$order->doc4       = Input::get('doc4');
			$order->doc5       = Input::get('doc5');
			// Invoice Details
			$order->inv_num       = Input::get('inv_num');
			$order->inv_net       = Input::get('inv_net');
			$order->inv_vat       = Input::get('inv_vat');
			$order->inv_tot       = Input::get('inv_tot');
			$order->inv_date       = Input::get('inv_date');
			$order->inv_status       = Input::get('inv_status');
			$order->inv_name       = Input::get('inv_name');
			$order->inv_email       = Input::get('inv_email');
			$order->inv_address       = Input::get('inv_address');
			$order->inv_postcode       = Input::get('inv_postcode');
			$order->inv_due_date       = Input::get('inv_due_date');	
			$order->inv_paid_date       = Input::get('inv_paid_date');
			$order->method       = Input::get('method');
			// Assessor Invoice Reference
			$order->ass_inv_ref       = Input::get('ass_inv_ref');
			$order->ass_inv_amount       = Input::get('ass_inv_amount');
			$order->ass_inv_vat       = Input::get('ass_inv_vat');
			$order->ass_inv_tot       = Input::get('ass_inv_tot');
			$order->ass_inv_date       = Input::get('ass_inv_date');
			$order->ass_inv_status       = Input::get('ass_inv_status');
			$order->ass_inv_due_date       = Input::get('ass_inv_due_date');
			$order->ass_inv_paid_date       = Input::get('ass_inv_paid_date');
			// Survey Appointment Details
			$order->sur_date       = Input::get('sur_date');
			$order->sur_time       = Input::get('sur_time');
			$order->sur_arr       = Input::get('sur_arr');
			$order->sur_email       = Input::get('sur_email');
			$order->sur_address       = Input::get('sur_address');
			$order->sur_postcode       = Input::get('sur_postcode');
			$order->save();

			// redirect
			Session::flash('message', 'Successfully updated Order!');
			return Redirect::to('orders');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Order::destroy($id);

		return Redirect::route('orders.index');
	}	

}