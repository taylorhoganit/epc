<?php

class NotesController extends \BaseController {
	protected $layout = "layouts.main";
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		$order = Order::find($id);
		$userType = Session::get('type');
		$perms = DB::table('permissions')->where('user_type', $userType)->first();
		$this->layout->content = View::make('notes.edit', compact('order'), compact('perms'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$order = Order::find($id);
		// Order Details
		$order->order_notes = Input::get('order_notes');
		$order->inv_notes = Input::get('inv_notes');
		$order->ass_notes = Input::get('ass_notes');
		$order->sur_notes = Input::get('sur_notes');
		$order->save();

		// redirect
		Session::flash('message', 'Successfully updated Order Notes!');
		return Redirect::to('orders');
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