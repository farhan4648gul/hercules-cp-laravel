<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

/*
User
*/
Route::post('user/login', array('as' => 'user/login', 'before' => 'csrf', 'uses' => 'UserController@login'));
Route::post('user/register', array('as' => 'user/register', 'before' => 'csrf', 'uses' => 'UserController@register'));
Route::get('user/register', function()
{
	if (Auth::check())
	{
		//return Redirect::to('/');
	}
	return View::make('user.register');
});
Route::get('user/logout', array('as' => 'user/logout', 'uses' => 'UserController@logout'));