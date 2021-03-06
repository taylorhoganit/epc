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
		//$orders = Order::all();
		$orders = DB::table('orders')->paginate(3);
		$users = User::all();
		$userType = Session::get('type');
		$perms = DB::table('permissions')->where('user_type', $userType)->first();
		$this->layout->content = View::make('orders.index', compact('orders'), compact('perms'));
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
		$userType = Session::get('type');
		$perms = DB::table('permissions')->where('user_type', $userType)->first();
		$this->layout->content = View::make('orders.edit', compact('order'), compact('perms'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
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
		$userType = Session::get('type');
		$perms = DB::table('permissions')->where('user_type', $userType)->first();
		// process the login
		if ($validator->fails()) {
			return Redirect::to('orders/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			if ($userType == 'Super')
			{
				$destinationPath    = 'public/uploads/'; // The destination were you store the image.
				// store SUPER
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
				if(Input::file('doc1') != "")
				{
					// Get the image input
				    $doc1 = Input::file('doc1');
				    //$filename           = $doc1->getClientOriginalName(); // Original file name that the end user used for it.
				    $mime_type          = $doc1->getMimeType(); // Gets this example image/png
			   	    $extension          = $doc1->getClientOriginalExtension(); // The original extension that the user used example .jpg or .png.
					$filename           = str_random(12).'.'.$extension; // Original file name that the end user used for it.
					$upload_success     = $doc1->move($destinationPath, $filename); // Now we move the file to its new home.
					$order->doc1       = $filename;
				}
				if(Input::file('doc2') != "")
				{
					// Get the image input
				    $doc2 = Input::file('doc2');
				    //$filename           = $doc1->getClientOriginalName(); // Original file name that the end user used for it.
				    $mime_type          = $doc2->getMimeType(); // Gets this example image/png
			   	    $extension          = $doc2->getClientOriginalExtension(); // The original extension that the user used example .jpg or .png.
					$filename           = str_random(12).'.'.$extension; // Original file name that the end user used for it.
					$upload_success     = $doc2->move($destinationPath, $filename); // Now we move the file to its new home.
					$order->doc2       = $filename;
				}
				if(Input::file('doc3') != "")
				{
					// Get the image input
				    $doc3 = Input::file('doc3');
				    //$filename           = $doc1->getClientOriginalName(); // Original file name that the end user used for it.
				    $mime_type          = $doc3->getMimeType(); // Gets this example image/png
			   	    $extension          = $doc3->getClientOriginalExtension(); // The original extension that the user used example .jpg or .png.
					$filename           = str_random(12).'.'.$extension; // Original file name that the end user used for it.
					$upload_success     = $doc3->move($destinationPath, $filename); // Now we move the file to its new home.
					$order->doc3       = $filename;
				}
				if(Input::file('doc4') != "")
				{
					// Get the image input
				    $doc4 = Input::file('doc4');
				    //$filename           = $doc1->getClientOriginalName(); // Original file name that the end user used for it.
				    $mime_type          = $doc4->getMimeType(); // Gets this example image/png
			   	    $extension          = $doc4->getClientOriginalExtension(); // The original extension that the user used example .jpg or .png.
					$filename           = str_random(12).'.'.$extension; // Original file name that the end user used for it.
					$upload_success     = $doc4->move($destinationPath, $filename); // Now we move the file to its new home.
					$order->doc4       = $filename;
				}
				if(Input::file('doc5') != "")
				{
					// Get the image input
				    $doc5 = Input::file('doc5');
				    //$filename           = $doc1->getClientOriginalName(); // Original file name that the end user used for it.
				    $mime_type          = $doc5->getMimeType(); // Gets this example image/png
			   	    $extension          = $doc5->getClientOriginalExtension(); // The original extension that the user used example .jpg or .png.
					$filename           = str_random(12).'.'.$extension; // Original file name that the end user used for it.
					$upload_success     = $doc5->move($destinationPath, $filename); // Now we move the file to its new home.
					$order->doc5       = $filename;
				}
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
				$order->new_job       = '0';
				$order->save();
			}
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
		// delete
		$order = Order::find($id);
		$order->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the Order!');
		return Redirect::to('orders');
	}

	public function postSearch()
	{
		$search_order_from_date = Input::get('search_order_from_date');
		$search_order_to_date = Input::get('search_order_to_date');
		$search_order_type = Input::get('search_order_type');
		$search_order_status = Input::get('search_order_status');
		$search_order_agent = Input::get('search_order_agent');
		$search_order_assessor = Input::get('search_order_assessor');
		$search_order_postcode = Input::get('search_order_postcode');
		
		$orders = DB::table('orders')
		->where('order_date', '>=', $search_order_from_date, 'and', 'order_date', '<=', $search_order_to_date, 'or')
		->orWhere('type', '=', $search_order_type)
		->orWhere('epc_status', '=', $search_order_status)
		->orWhere('agent', '=', $search_order_agent)
		->orWhere('assessor', '=', $search_order_assessor)
		->orWhere('postcode', '=', $search_order_postcode)
		->paginate();
		Session::put('search', 'search query');
		$users = User::all();
		$userType = Session::get('type');
		$perms = DB::table('permissions')->where('user_type', $userType)->first();
		$this->layout->content = View::make('orders.index', compact('orders'), compact('perms'));
	}	

}