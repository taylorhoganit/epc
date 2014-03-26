<?php

class UserController extends \BaseController {
	protected $layout = "layouts.main";
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		$this->layout->content = View::make('user.index', compact('users'));
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
		$user = User::find($id);

		$this->layout->content = View::make('user.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
		// User Details
		$user->firstname = Input::get('firstname');
		$user->lastname = Input::get('lastname');
		$user->email = Input::get('email');
		$user->type = Input::get('type');
		$user->address = Input::get('address');
		$user->postcode = Input::get('postcode');
		$user->save();

		// redirect
		Session::flash('message', 'Successfully updated User Details');
		return Redirect::to('user');
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