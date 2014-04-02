<?php
 
class UsersController extends BaseController {
 	protected $layout = "layouts.main";

 	public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	    $this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}

 	public function getRegister() {
	    $this->layout->content = View::make('users.register');
	}

	public function postCreate() {
        $validator = Validator::make(Input::all(), User::$rules);
 
		if ($validator->passes()) {
			    $user = new User;
			    $user->firstname = Input::get('firstname');
			    $user->lastname = Input::get('lastname');
			    $user->email = Input::get('email');
			    $user->password = Hash::make(Input::get('password'));
			    $user->type = Input::get('type');
			    $user->address = Input::get('address');
			    $user->postcode = Input::get('postcode');
			    $user->save();
		    	return Redirect::to('users/login')->with('message', 'Thanks for registering!');
	    	} else {
		    	return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
	    }
	}

	public function getEdit($id)
	{
		$user = User::find($id);

		$this->layout->content = View::make('users.edit', compact('user'));
	}
	public function postEdit($id)
	{
	    $user = User::find($id);
	    $user->firstname = Input::get('firstname');
	    $user->lastname = Input::get('lastname');
	    $user->email = Input::get('email');
	    $user->password = Hash::make(Input::get('password'));
	    $user->type = Input::get('type');
	    $user->address = Input::get('address');
	    $user->postcode = Input::get('postcode');
	    $user->save();
	}

	public function getLogin() {
	    $this->layout->content = View::make('users.login');
	}

	public function postSignin() {
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
        	$userType = DB::table('users')->where('email', Input::get('email'))->pluck('type');
        	Session::put('type', $userType);
		    return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
			} else {
			    return Redirect::to('users/login')
		        ->with('message', 'Your username/password combination was incorrect')
		        ->withInput();
		}     
	}

	public function getDashboard() {
     	$this->layout->content = View::make('users.dashboard');
	}

	public function getList()
	{
		$users = User::all();

		$this->layout->content = View::make('users.list', compact('users'));
	}

}
?>