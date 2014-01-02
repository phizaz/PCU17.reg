<?php

class RegisterController extends BaseController {

	public function getIndex()
	{
		$credential = array();
		if(Session::has('credential')) 
			$credential = Session::get('credential');
		$faculty = array();
		if(Session::has('faculty'))
			$faculty = Session::get('faculty');
		$months = DB::table('month')->get();
		return View::make('form', array(
			'url' => URL::to(''),
			'months' => $months,
			'credential' => $credential,
			'faculty' => $faculty));
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
		$drug = Input::get('drug');
		$disease = Input::get('disease');
		$address = Input::get('address');
		$road = Input::get('road');
		$moo = Input::get('moo');
		$province = Input::get('province');
		$zip_code = Input::get('zip_code');
		$amphur = Input::get('amphur');
		$tambol = Input::get('tambol');
		$phone_home = Input::get('phone_home');
		$phone_mobile = Input::get('phone_mobile');
		$parent_income = Input::get('parent_income');
		$school_level = Input::get('school_level');
		$school_plan = Input::get('school_plan');
		$school_name = Input::get('school_name');
		$school_province = Input::get('school_province');
		$school_amphur = Input::get('school_amphur');
		$method_arrive = Input::get('method_arrive');
		$method_depart = Input::get('method_depart');
		$course = Input::get('course');
		$contact1_name = Input::get('contact1_name');
		$contact1_phone = Input::get('contact1_phone');
		$contact1_relation = Input::get('contact1_relation');
		$contact2_name = Input::get('contact2_name');
		$contact2_phone = Input::get('contact2_phone');
		$contact2_relation = Input::get('contact2_relation');
		$faculty1 = Input::get('faculty1');
		$faculty2 = Input::get('faculty2');
		$faculty3 = Input::get('faculty3');
		$faculty4 = Input::get('faculty4');

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
			'drug' => $drug,
			'disease' => $disease,
			'address' => $address,
			'road' => $road,
			'moo' => $moo,
			'province' => $province, 
			'zip_code' => $zip_code,
			'amphur' => $amphur,
			'tambol' => $tambol,
			'phone_home' => $phone_home,
			'phone_mobile' => $phone_mobile,
			'parent_income' => $parent_income,
			'school_level' => $school_level,
			'school_plan' => $school_plan,
			'school_name' => $school_name,
			'school_province' => $school_province,
			'school_amphur' => $school_amphur,
			'method_arrive' => $method_arrive,
			'method_depart' => $method_depart,
			'course' => $course,
			'contact1_name' => $contact1_name,
			'contact1_phone' => $contact1_phone,
			'contact1_relation' => $contact1_relation,
			'contact2_name' => $contact2_name,
			'contact2_phone' => $contact2_phone,
			'contact2_relation' => $contact2_relation,
			'faculty1' => $faculty1,
			'faculty2' => $faculty2,
			'faculty3' => $faculty3,
			'faculty4' => $faculty4
			);
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
			'address' => 'required|address',
			'road' => 'thai',
			'moo' => 'numeric',
			'zip_code' => 'required|numeric|digits:5',
			'phone_mobile' => 'required|phone',
			'phone_home' => 'required|phone',
			'school_name' => 'required|thai',
			'method_arrive'  => 'required|thai',
			'method_depart'  => 'required|thai',
			'contact1_name' => 'required|thai',
			'contact1_phone' => 'required|numeric',
			'contact1_relation' => 'required|thai',
			'contact2_name' => 'required|thai',
			'contact2_phone' => 'required|numeric',
			'contact2_relation' => 'required|thai',
			'faculty1' => 'required|thai',
			'faculty2' => 'required|thai',
			'faculty3' => 'required|thai',
			'faculty4' => 'required|thai');

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
			'address.address' => 'รูปแบบการกรอกบ้านเลขที่ไม่ถูกต้อง',
			'road.required' => 'กรุณากรอกถนน',
			'road.thai' => 'กรุณากรอกถนนเป็นภาษาไทย',
			'moo.numeric' => 'กรุณากรอกหมู่เป็นตัวเลข',
			'zip_code.required' => 'กรุณากรอกรหัสไปรษณีย์',
			'zip_code.numeric' => 'กรุณากรอกรหัสไปรษณีย์เป็นตัวเลข',
			'zip_code.digits' => 'กรุณากรอกรหัสไปรษณีย์ให้ครบ 5 หลัก',
			'phone_mobile.required' => 'กรุณากรอกหมายเลขโทรศัพท์มือถือ',
			'phone_mobile.phone' => 'รูปแบบการกรอกหมายเลขโทรศัพท์มือถือไม่รถูกต้อง',
			'phone_home.required' => 'กรุณากรอกหมายเลขโทรศัพท์บ้าน',
			'phone_home.phone' => 'รูปแบบการกรอกหมายเลขโทรศัพท์บ้านไม่รถูกต้อง',
			'school_name.required' => 'กรุณากรอกชื่อโรงเรียน',
			'school_name.thai' => 'กรุณากรอกชื่อโรงเรียนเป็นภาษาไทย',
			'method_arrive.required' => 'กรุณากรอกวิธีการเดินทางมา',
			'method_arrive.thai' => 'กรุณากรอกวิธีการเดินทางมาเป็นภาษาไทย',
			'method_depart.required' => 'กรุณากรอกวิธีการเดินทางกลับ',
			'method_depart.thai' => 'กรุณากรอกวิธีการเดินทางกลับเป็นภาษาไทย',
			'contact1_name.required' => 'กรุณาใส่ชื่อผู้ติดต่อ 1',
			'contact1_name.thai' => 'กรุณาใส่ชื่อผู้ติดต่อ 1 เป็นภาษาไทย',
			'contact1_phone.required' => 'กรุณาใส่เบอร์ผู้ติดต่อ 1',
			'contact1_phone.numeric' => 'รูปแบบเบอร์ผู้ติดต่อ 1 ไม่ถูกต้อง',
			'contact1_relation.required' => 'กรุณาใส่ความสัมพันธ์ผู้ติดต่อ 1',
			'contact1_relation.thai' => 'กรุณาใส่ความสัมพันธ์ผู้ติดต่อ 1 เป็นภาษาไทย',
			'contact2_name.required' => 'กรุณาใส่ชื่อผู้ติดต่อ 2',
			'contact2_name.thai' => 'กรุณาใส่ชื่อผู้ติดต่อ 2 เป็นภาษาไทย',
			'contact2_phone.required' => 'กรุณาใส่เบอร์ผู้ติดต่อ 2',
			'contact2_phone.numeric' => 'รูปแบบเบอร์ผู้ติดต่อ 2 ไม่ถูกต้อง',
			'contact2_relation.required' => 'กรุณาใส่ความสัมพันธ์ผู้ติดต่อ 2',
			'contact2_relation.thai' => 'กรุณาใส่ความสัมพันธ์ผู้ติดต่อ 2 เป็นภาษาไทย',
			'faculty1.required' => 'กรุณาใส่คณะที่ต้องการศึกษาต่อ 1',
			'faculty1.thai' => 'กรุณาใส่คณะที่ต้องการศึกษาต่อ 1เป็นภาษาไทย',
			'faculty2.required' => 'กรุณาใส่คณะที่ต้องการศึกษาต่อ 2',
			'faculty2.thai' => 'กรุณาใส่คณะที่ต้องการศึกษาต่อ 2เป็นภาษาไทย',
			'faculty3.required' => 'กรุณาใส่คณะที่ต้องการศึกษาต่อ 3',
			'faculty3.thai' => 'กรุณาใส่คณะที่ต้องการศึกษาต่อ 3เป็นภาษาไทย',
			'faculty4.required' => 'กรุณาใส่คณะที่ต้องการศึกษาต่อ 4',
			'faculty4.thai' => 'กรุณาใส่คณะที่ต้องการศึกษาต่อ 4เป็นภาษาไทย');

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
				'method_depart' => $method_depart,
				'contact1_name' => $contact1_name,
				'contact1_phone' => $contact1_phone,
				'contact1_relation' => $contact1_relation,
				'contact2_name' => $contact2_name,
				'contact2_phone' => $contact2_phone,
				'contact2_relation' => $contact2_relation,
				'faculty1' => $faculty1,
				'faculty2' => $faculty2,
				'faculty3' => $faculty3,
				'faculty4' => $faculty4 ),
			$rules,
			$messages);

		//Check if any failure ? then show the messages to user.
		if($validator->fails()) {
			//This only the example of how to things work. REALLY!!!!
			//return Redirect::to('reg')->withErrors($validator);
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
			'drug' => $drug,
			'disease' => $disease,
			'address' => $address,
			'road' => $road,
			'moo' => $moo,
			'province' => $province,
			'zip_code' => $zip_code,
			'amphur' =>$amphur,
			'tambol' => $tambol,
			'phone_home' => $phone_home,
			'phone_mobile' => $phone_mobile,
			'parent_income' => $parent_income,
			'school_level' => $school_level,
			'school_plan' => $school_plan,
			'school_name' => $school_name,
			'school_province' => $school_province,
			'school_amphur' => $school_amphur,
			'method_arrive' => $method_arrive,
			'method_depart' => $method_depart,
			'course' => $course,
			'contact1_name' => $contact1_name,
			'contact1_phone' => $contact1_phone,
			'contact1_relation' => $contact1_relation,
			'contact2_name' => $contact2_name,
			'contact2_phone' => $contact2_phone,
			'contact2_relation' => $contact2_relation,
			'faculty1' => $faculty1,
			'faculty2' => $faculty2,
			'faculty3' => $faculty3,
			'faculty4' => $faculty4 ));
	}

	public function anyConfirm() {
		$credential = Session::get('credential');
		Session::forget('credential');
		$credential['birth_date'] = date('Y-m-d',
			strtotime($credential['day'] . " " . $credential['month'] . " " . $credential['year']));
		$candidate = new Candidate($credential);		
		$candidate->save();

		$cand_id = DB::table('candidate')->select('id')->where('national_id','=',$credential['national_id'])->get();
		DB::insert('insert into faculty(cand_id, faculty, ranking) values (?, ?, ?)', array($cand_id[0]->id, $credential['faculty1'],1));
		DB::insert('insert into faculty(cand_id, faculty, ranking) values (?, ?, ?)', array($cand_id[0]->id, $credential['faculty2'],2));
		DB::insert('insert into faculty(cand_id, faculty, ranking) values (?, ?, ?)', array($cand_id[0]->id, $credential['faculty3'],3));
		DB::insert('insert into faculty(cand_id, faculty, ranking) values (?, ?, ?)', array($cand_id[0]->id, $credential['faculty4'],4));

		Auth::login($candidate);
		return Redirect::to('print');
	}

	//just for debugging.
	public function anyClear() {
		Session::forget('credential');
		return 'cleared';
	}
}