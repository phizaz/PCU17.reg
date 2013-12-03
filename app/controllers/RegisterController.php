<?php

class RegisterController extends BaseController {

	public function getIndex()
	{
		$months = DB::table('month')->get();
		return View::make('form', 
			array(
				'url' => URL::to(''),
				'months' => $months));
	}

	public function postIndex()
	{


		$name_prefix = Input::get('name_prefix');
		$name_first = Input::get('name_first');
		$name_last = Input::get('name_last');
		$nickname = Input::get('nickname');
		$religion = Input::get('religion');
		$national_id = Input::get('national_id');
		// ------ Make Date-------------
		$day = Input::get('day');
		$month = Input::get('month');
		$year = Input::get('year');
		$date = date('Y-m-d',strtotime($day." ".$month." ".$year));
		// ------- End Make Date -------
		$facebook = Input::get('facebook');
		$email = Input::get('email');
		$blood_group = Input::get('blood_group');
		$shirt_size = Input::get('shirt_size');
		$food_allergies = Input::get('food_allergies');

		DB::table('candidate')->insert(array('name_prefix' => $name_prefix, 
					'name_first' => $name_first,
					'name_last' => $name_last,
					'nickname' => $nickname,
					'religion' => $religion,
					'national_id' => $national_id,
					'birth_date' => $date,
					'facebook' => $facebook,
					'email' => $email,
					'blood_group' => $blood_group,
					'shirt_size' => $shirt_size,
					'food_allergies' => $food_allergies
		));

		return View::make('showSubmit', 
			array(	'name_prefix' => $name_prefix, 
					'name_first' => $name_first,
					'name_last' => $name_last,
					'nickname' => $nickname,
					'religion' => $religion,
					'national_id' => $national_id,
					'date' => $date,
					'facebook' => $facebook,
					'email' => $email,
					'blood_group' => $blood_group,
					'shirt_size' => $shirt_size,
					'food_allergies' => $food_allergies));

	}

}