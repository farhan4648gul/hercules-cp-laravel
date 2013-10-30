<?php

class UserController extends BaseController {

	public function login()
	{
		$requestUri = Input::has('login_uri') ? Input::get('login_uri') : '/';

		if (Input::has('login_username') && 
			Input::has('login_password'))
		{

			$user_data = array('username' => Input::get('login_username'), 'password' => Input::get('login_password'));

			if (Auth::attempt($user_data))
			{
				return Redirect::to($requestUri)->with('message', 'You are now logged in.');
			}
			return Redirect::to($requestUri)->withInput(Input::except('login_password'))
										 	->with('error', 'Invalid username or password!');
		}
		else
		{

		}
		return Redirect::to($requestUri)->withInput(Input::except('login_password'))
										->with('error', 'Please enter your username and password.');
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function register()
	{
		if (Auth::check())
		{
			return Redirect::to('/');
		}
		$rules = array(
			'name'	   => 'required|min:4|unique:users',
			'username' => 'required|min:4|unique:users',
			'password' => 'required|min:4|confirmed',
			'email'	   => 'required|email|unique:users',
		);
		$messages = array();

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails())
		{
			return Redirect::to('user/register')->withErrors($validator)
												->withInput();
		}

		$user = new User;

		$user->username   = Input::get('username');
		$user->password   = Hash::make(Input::get('password'));
		$user->email	  = Input::get('email');
		$user->name		  = Input::get('name');
		$user->created_at = new DateTime;
		$user->updated_at = new DateTime;

		if ($user->save())
		{
			return Redirect::to('/')->with('message', 'You are now registered.');
		}
	}
}