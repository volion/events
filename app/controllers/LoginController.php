<?php

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /login
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('login.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /login/create
	 *
	 * @return Response
	 */
	public function register()
	{
		return View::make('login.register');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /login
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validator = Validator::make($input, User::$rules);

		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$dt = new DateTime();

		$user = new User;
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->date_sign = $dt->format('Y-m-d H:i:s');
		$user->save();

		// Auth::loginUsingId($user->pk);

		return Redirect::route('login.index')->with('success-message', 'Thank you for registration! Now you can add events!');
	}

	/**
     * Log in to site.
     *
     * @return Response
     */
    public function login()
    {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')), true)) {
            
            return Redirect::intended('events');
        }

        return Redirect::back()->withInput(Input::except('password'))->with('danger-message', 'Wrong credentials!');
    }

	/**
     * Change user's password for log in.
     * GET /login/changepassword
     *
     * @return Response
     */
	public function changePasswordForm()
	{
		return View::make('auth.change');
	}

	public function changePasswordStore()
	{
		if (Hash::check(Input::get('old_password'), Auth::user()->password)) {
			
			$rules = array(
				'password' => 'required|alpha_num|between:6,200'
				);

			$validator = Validator::make(Input::all(), $rules);

			if ($validator->fails()) {
				return Redirect::back()->withInput()->withErrors($validator);
			}

			$user = Auth::user();
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			return Redirect::route('events.index')->with('success-message', 'Password updated!');
		}

		return Redirect::back()->with('danger-message', 'Wrong credentials!');
	}

	/**
     * Log out from site.
     *
     * @return Response
     */
	public function logout()
    {
        Auth::logout();

        return Redirect::route('events.index')->with('info-message', 'See you again!');
    }

}