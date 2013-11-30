<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showForm()
	{
		return View::make('form');
	}

	public function showSubmit()
	{
		$name_prefix = Input::get('name_prefix');
		$name_first = Input::get('name_first');
		$name_last = Input::get('name_last');

		return View::make('showSubmit', array(	'name_prefix' => $name_prefix, 
												'name_first' => $name_first,
												'name_last' => $name_last));

	}


}