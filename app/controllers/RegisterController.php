<?php

class RegisterController extends BaseController {

	public function getIndex()
	{
		return View::make('form');
	}

	public function postIndex()
	{
		$name_prefix = Input::get('name_prefix');
		$name_first = Input::get('name_first');
		$name_last = Input::get('name_last');

		return View::make('showSubmit', 
			array(	'name_prefix' => $name_prefix, 
					'name_first' => $name_first,
					'name_last' => $name_last));

	}

}