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

		//Hand-made validation rules defined in ValidatorLib in controller folder.
		Validator::extend('thai', 'ValidatorLib@isThai');
		Validator::extend('national_id', 'ValidatorLib@isNationalId');

		//Rules array is defining the rules using.
		$rules = array(
			'name_prefix' => 'required|thai',
			'name_first' => 'required|thai', 
			'name_last' => 'required|thai', 
			'nickname' => 'required|thai',
			'religion' => 'required', 
			'national_id' => 'required|national_id');

		//Messages array is defining text to respond to each circumstances.
		$messages = array(
			'name_prefix.required' => 'กรุณากรอกคำนำหน้าชื่อ',
			'name_prefix.thai' => 'กรุณากรอกคำนำหน้าชื่อเป็นภาษาไทย',
			'name_first.required' => 'กรุณากรอกชื่อจริง',
			'name_first.thai' => 'กรุณากรอกชื่อจริงเป็นภาษาไทย',
			'name_last.required' => 'กรุณากรอกนามสกุล',
			'name_last.thai' => 'กรุณากรอกนามสกุลเป็นภาษาไทย',
			'nickname.required' => 'กรุณากรอกชื่อเล่น',
			'nickname.thai' => 'กรุณากรอกชื่อเล่นเป็นภาษาไทย',
			'religion.required' => 'กรุณากรอกข้อมูลศาสนา',
			'national_id.required' => 'กรุณากรอกเลขประจำตัวประชาชน',
			'national_id.national_id' => 'รูปแบบเลขประจำตัวประชาชนไม่ถูกต้อง');

		//Just turn the Validator on. the result kept in $validator.
		$validator = Validator::make(
			array(
				'name_prefix' => $name_prefix,
				'name_first' => $name_first,
				'name_last' => $name_last,
				'nickname' => $nickname,
				'religion' => $religion,
				'national_id' => $national_id),
			$rules,
			$messages);

		//Check if any failure ? then show the messages to user.
		/*if($validator->fails()) {
			$showMessages = $validator->messages();
			//This only the example of how to things work.
			return var_dump($showMessages->all());
		}*/

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
		$address = Input::get('address');
		$road = Input::get('road');
		$moo = Input::get('moo');
		$province = Input::get('province');
		$zip_code = Input::get('zip_code');
		$amphur = Input::get('amphur');
		$tambol = Input::get('tambol');
		$phone_home = Input::get('phone_home');
		$phone_mobile = Input::get('phone_mobile');
		$school_level = Input::get('school_level');
		$school_plan = Input::get('school_plan');
		$school_name = Input::get('school_name');
		$school_province = Input::get('school_province');
		$school_amphur = Input::get('school_amphur');
		$method_arrive = Input::get('method_arrive');
		$method_depart = Input::get('method_depart');
		$course = Input::get('course');

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
					'food_allergies' => $food_allergies,
					'address' => $address,
					'road' => $road,
					'moo' => $moo,
					'province' => $province,
					'zip_code' => $zip_code,
					'amphur' =>$amphur,
					'tambol' => $tambol,
					'phone_home' => $phone_home,
					'phone_mobile' => $phone_mobile,
					'school_level' => $school_level,
					'school_plan' => $school_plan,
					'school_name' => $school_name,
					'school_province' => $school_province,
					'school_amphur' => $school_amphur,
					'method_arrive' => $method_arrive,
					'method_depart' => $method_depart,
					'course' => $course
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
					'food_allergies' => $food_allergies,
					'address' => $address,
					'road' => $road,
					'moo' => $moo,
					'province' => $province,
					'zip_code' => $zip_code,
					'amphur' =>$amphur,
					'tambol' => $tambol,
					'phone_home' => $phone_home,
					'phone_mobile' => $phone_mobile,
					'school_level' => $school_level,
					'school_plan' => $school_plan,
					'school_name' => $school_name,
					'school_province' => $school_province,
					'school_amphur' => $school_amphur,
					'method_arrive' => $method_arrive,
					'method_depart' => $method_depart,
					'course' => $course));

	}

}