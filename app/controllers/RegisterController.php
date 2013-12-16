<?php

class RegisterController extends BaseController {

	public function getIndex()
	{
		$credential = array();
		if(Session::has('credential')) 
			$credential = Session::get('credential');
		$months = DB::table('month')->get();
		return View::make('form', array(
			'url' => URL::to(''),
			'months' => $months,
			'credential' => $credential));
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

		$credential = array(
			'name_prefix' => $name_prefix,
			'name_first' => $name_first,
			'name_last' => $name_last,
			'nickname' => $nickname,
			'religion' => $religion,
			'national_id' => $national_id,
			'day' => $day,
			'month' => $month,
			'year' => $year,
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
			'amphur' => $amphur,
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
			'course' => $course);

		//Keeps in session.
		Session::put('credential', $credential);

		//Hand-made validation rules defined in ValidatorLib in controller folder.
		Validator::extend('thai', 'ValidatorLib@isThai');
		Validator::extend('national_id', 'ValidatorLib@isNationalId');
		Validator::extend('address', 'ValidatorLib@isAddress');
		Validator::extend('phone', 'ValidatorLib@isPhone');
		Validator::extend('zipcode', 'ValidatorLib@isZipcode');

		//Rules array is defining the rules using.
		$rules = array(
			'name_prefix' => 'required|thai',
			'name_first' => 'required|thai', 
			'name_last' => 'required|thai', 
			'nickname' => 'required|thai',
			'religion' => 'required', 
			'national_id' => 'required|national_id',
			'email' => 'required|email',
			'address' => 'required|numeric',
			'road' => 'required|thai',
			'moo' => 'numeric',
			'zip_code' => 'required|zipcode',
			'phone_mobile' => 'required|phone',
			'phone_home' => 'required|phone',
			'school_name' => 'required|thai',
			'method_arrive'  => 'required|thai',
			'method_depart'  => 'required|thai');

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
			'national_id.national_id' => 'รูปแบบเลขประจำตัวประชาชนไม่ถูกต้อง',
			'email.required' => 'กรุณากรอกอีเมล์',
			'email.email' => 'รูปแบบการกรอกอีเมล์ไม่ถูกต้อง',
			'address.required' => 'กรุณากรอกย้านเลขที่',
			'address.numeric' => 'รูปแบบการกรอกบ้านเลขที่ไม่ถูกต้อง',
			'road.required' => 'กรุณากรอกถนน',
			'road.thai' => 'กรุณากรอกถนนเป็นภาษาไทย',
			'moo.numeric' => 'กรุณากรอกหมู่เป็นตัวเลข',
			'zip_code.required' => 'กรุณากรอกรหัสไปรษณีย์',
			'zip_code.zipcode' => 'กรุณากรอกรหัสไปรษณีย์เป็นตัวเลข',
			'phone_mobile.required' => 'กรุณากรอกหมายเลขโทรศัพท์มือถือ',
			'phone_mobile.phone' => 'รูปแบบการกรอกหมายเลขโทรศัพท์มือถือไม่รถูกต้อง',
			'phone_home.required' => 'กรุณากรอกหมายเลขโทรศัพท์บ้าน',
			'phone_home.phone' => 'รูปแบบการกรอกหมายเลขโทรศัพท์บ้านไม่รถูกต้อง',
			'school_name.required' => 'กรุณากรอกชื่อโรงเรียน',
			'school_name.thai' => 'กรุณากรอกชื่อโรงเรียนเป็นภาษาไทย',
			'method_arrive.required' => 'กรุณากรอกวิธีการเดินทางมา',
			'method_arrive.thai' => 'กรุณากรอกวิธีการเดินทางมาเป็นภาษาไทย',
			'method_depart.required' => 'กรุณากรอกวิธีการเดินทางกลับ',
			'method_depart.thai' => 'กรุณากรอกวิธีการเดินทางกลับเป็นภาษาไทย');

		//Just turn the Validator on. the result kept in $validator.
		$validator = Validator::make(
			array(
				'name_prefix' => $name_prefix,
				'name_first' => $name_first,
				'name_last' => $name_last,
				'nickname' => $nickname,
				'religion' => $religion,
				'national_id' => $national_id,
				'email' => $email,
				'address' => $address,
				'road' => $road,
				'moo' => $moo,
				'zip_code' => $zip_code,
				'phone_mobile'=> $phone_mobile,
				'phone_home' => $phone_home,
				'school_name' => $school_name,
				'method_arrive' => $method_arrive,
				'method_depart' => $method_depart ),
			$rules,
			$messages);

		//Check if any failure ? then show the messages to user.
		if($validator->fails()) {
			$showMessages = $validator->messages();
			//This only the example of how to things work. REALLY!!!!
			return Redirect::to('reg')->withErrors($validator);
		}

		

		return View::make('showSubmit', array(	
			'name_prefix' => $name_prefix, 
			'name_first' => $name_first,
			'name_last' => $name_last,
			'nickname' => $nickname,
			'religion' => $religion,
			'national_id' => $national_id,
			'day' => $day,
			'month' => $month,
			'year' => $year,
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

	public function anyConfirm() {
		$credential = Session::get('credential');
		Session::forget('credential');
		$credential['birth_date'] = date('Y-m-d',
			strtotime($credential['day'] . " " . $credential['month'] . " " . $credential['year']));
		$candidate = new Candidate($credential);
		$candidate->save();

		Auth::login($candidate);
		return Redirect::to('print');
	}

	//just for debugging.
	public function anyClear() {
		Session::forget('credential');
		return 'cleared';
	}
}