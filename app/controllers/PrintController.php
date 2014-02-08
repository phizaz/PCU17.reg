<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PrintController extends BaseController {
	public function getReturn() {
		return Redirect::to(URL::to('') . '/#return');
	}

	public function postReturn() {
		$national_id = Input::get('national_id');
		try {
			$candidate = Candidate::where('national_id', '=', $national_id)->firstOrFail();
			Auth::login($candidate);
			return Redirect::intended('print');
		} catch (ModelNotFoundException $e) {
			Session::flash('fail', true);
			return Redirect::to(URL::to('') . '/#return');
		}
	}

	public function getIndex() {
		return View::make('print', array(
			'credential' => Auth::user(), 'faculty' => Session::get('faculty'), 'url' => URL::to('')));
	}

	private function p($text){
		return iconv('utf-8', 'cp874', $text);
	}

	public function getPdf(){
		$path = app_path() . '/libs';
		require($path . '/fpdf.php');
		require($path . '/fpdi/fpdi.php');
		define('FPDF_FONTPATH', $path . '/font/');
		$credential = Auth::user();
		
		$pdf = new FPDI();
		$pdf->AddFont('sarabun','','THSarabun.php');

		//Set font as angsana 14pt
		$pdf->SetFont('sarabun','',14);

		//Import pages from pdf
		$pageCount = $pdf->setSourceFile($path . '/form.pdf');
		$pages = array();
		for($i = 1; $i <= $pageCount; ++$i) {
			$pages[] = $pdf->importPage($i);
		}

		$pdf->addPage();
		$pdf->useTemplate($pages[2], 0, 0);

		$row = 69;
		$col = 25;
		$height = 5.65;

		//Write Name Header
		$pdf->setXY(78 , 12);
		$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->multiCell(56, $height, $text, 0, 'C', false);

		//Write Name
		$pdf->setXY($col,$row);
		$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->multiCell(56, $height, $text, 0, 'C', false);
		//Write National ID
		$pdf->setXY($col + 90, $row);
		$text = $credential->national_id;
		$pdf->multiCell(42, $height, $text, 0, 'C', false);
		//Write Nickname
		$row += $height;
		$col += 5;
		$pdf->setXY($col, $row);
		$text = $this->p($credential->nickname);
		$pdf->multiCell(14, $height, $text, 0, 'C', false);
		//Write Age
		$pdf->setXY($col + 14 + 7.5, $row);
			//Caculate Age
			$birth_date = $credential->birth_date;
			$age = floor(((abs(strtotime(date("Y-m-d")) - strtotime($birth_date))/(60*60*24)))/365);
			$text = $age;
		$pdf->multiCell(6, $height, $text, 0, 'C', false);
		//Write Birth Date
		$pdf->setXY($col + 14 + 8 + 5 + 28, $row);
		$text = date("d-m-Y", strtotime($credential->birth_date));
		$pdf->multiCell(23, $height, $text, 0, 'C', false);
		//Write Religion
		$pdf->setXY($col + 14 + 8 + 5 + 28 + 23 + 11, $row);
		$text = $this->p($credential->religion);
		$pdf->multiCell(13, $height, $text, 0, 'C', false);
		//Write Blood Group
		$pdf->setXY($col + 14 + 8 + 5 + 28 + 23 + 11 + 27, $row);
		$text = $credential->blood_group;
		$pdf->multiCell(11, $height, $text, 0, 'C', false);
		//Write Food Allergies
		$row += $height;
		$col += 4;
		$pdf->setXY($col, $row);
		$text = $credential->food_allergies;
		if ($text == "") {
			$text = "-";
		}
		$pdf->multiCell(10, $height, $text, 0, 'C', false);
		//Write Drug
		$pdf->setXY($col + 10 + 10, $row);
		$text = $credential->drug;
		if ($text == "") {
			$text = "-";
		}
		$pdf->multiCell(16, $height, $text, 0, 'C', false);		
		//Write Disease
		$pdf->setXY($col + 10 + 10 + 16 + 19, $row);
		$text = $credential->disease;
		if ($text == "") {
			$text = "-";
		}
		$pdf->multiCell(26, $height, $text, 0, 'C', false);
		//Write Facebook
		$row += $height;
		$col += 2;
		$pdf->setXY($col , $row);
		$text = $this->p($credential->facebook);
		$pdf->multiCell(48, $height, $text, 0, 'C', false);
		//Write Email
		$pdf->setXY($col + 36 + 22, $row);
		$text = $this->p($credential->email);
		$pdf->multiCell(49, $height, $text, 0, 'C', false);
		//Write Address
		$row += $height;
		$col -= 9;
		$pdf->setXY($col, $row);
		//Address Road Moo
		$text = $this->p($credential->address);
		$text .= $credential->road == '' ? '' : $this->p(' ถนน ' . $credential->road);
		$text .= $credential->moo == '' ? '' : $this->p(' หมู่ ' . $credential->moo);
		//Tambol
		$getdata = DB::table('district')->select('DISTRICT_NAME')->where('DISTRICT_ID' , '=' , $credential->tambol)->get();
		$text .= $this->p(' ตำบล/แขวง ' . trim($getdata[0]->DISTRICT_NAME));
		//Amphur
		$getdata = DB::table('amphur')->select('AMPHUR_NAME')->where('AMPHUR_ID' , '=' , $credential->amphur)->get();
		$text .= $this->p(' อำเภอ/เขต ' . trim($getdata[0]->AMPHUR_NAME));
		//Province
		$getdata = DB::table('province')->select('PROVINCE_NAME')->where('PROVINCE_ID' , '=' , $credential->province)->get();
		$text .= $this->p(' จังหวัด ' . trim($getdata[0]->PROVINCE_NAME));
		//Zip Code
		$text .= ' ' . $credential->zip_code;
		$pdf->multiCell(130, $height, $text, 0, 'L', false);
		//Write Home Tel
		$row += 2 * $height;
		$col += 14;
		$pdf->setXY($col, $row);
		$text = $credential->phone_home;
		$pdf->multiCell(41, $height, $text, 0, 'C', false);
		//Write Mobile Tel
		$pdf->setXY($col + 41 + 17, $row);
		$text = $credential->phone_mobile;
		$pdf->multiCell(41, $height, $text, 0, 'C', false);
		//Write Salary
		$row += $height;
		$col += 12;
		$pdf->setXY($col, $row);
		$salary = $credential->parent_income;

		if ($salary == 0) $text = "น้อยกว่า 10,000";
		else if ($salary == 1) $text = "10,000 - 19,999";
		else if ($salary == 2) $text = "20,000 - 29,999";
		else if ($salary == 3) $text = "30,000 - 39,999";
		else if ($salary == 4) $text = "มากกว่า 40,000";

		$text = $this->p($text);
		$pdf->multiCell(30, $height, $text, 0, 'C', false);
		//Write Class
		$pdf->setXY($col + 29 + 55, $row);
		$text = $this->p('ม.' . $credential->school_level);
		$pdf->multiCell(15, $height, $text, 0, 'C', false);
		//Write School Plan
		$row += $height;
		$col -= 15;
		$pdf->setXY($col, $row);
		$school_plan = $credential->school_plan;
		if($school_plan == 0) $text = "วิทย์-คณิต";
		else if($school_plan == 1) $text = "ศิลป์-คำนวณ";
		else if($school_plan == 2) $text = "ศิลป์-ภาษา";
		$text = $this->p($text);
		$pdf->multiCell(25, $height, $text, 0, 'C', false);
		//Write School Name
		$pdf->setXY($col + 25 + 30, $row);
		$text = $this->p($credential->school_name);
		$pdf->multiCell(42, $height, $text, 0, 'C', false);
		//Write school province
		$getdata = DB::table('province')->select('PROVINCE_NAME')->where('PROVINCE_ID' , '=' , $credential->school_province)->get();
		$text = $this->p($getdata[0]->PROVINCE_NAME);
		$pdf->setXY($col + 25 + 32 + 39 + 8, $row);
		$pdf->multiCell(28, $height, $text, 0, 'C', false);
		//Write shirt_size
		$shirt_size = $credential->shirt_size;
		if($shirt_size == 0) $text='S';
		else if($shirt_size == 1) $text='M';
		else if($shirt_size == 2) $text='L';
		else if($shirt_size == 3) $text='XL';
		else if($shirt_size == 4) $text='XXL';
		$pdf->setXY($col + 25 + 32 + 39 + 8 + 28 + 10, $row);
		$pdf->multiCell(10, $height, $text, 0, 'C', false);
		//Write method_arrive
		$row += $height;
		$pdf->setXY($col + 28, $row);
		$text = $this->p($credential->method_arrive);
		$pdf->multiCell(130, $height, $text, 0, 'L', false);
		//Write method_depart
		$row += $height;
		$pdf->setXY($col + 20, $row);
		$text = $this->p($credential->method_depart);
		$pdf->multiCell(140, $height, $text, 0, 'L', false);
		//Write contact1 name
		$row += $height;
		$pdf->setXY($col + 23, $row);
		$text = $this->p($credential->contact1_name);
		$pdf->multiCell(55, $height, $text, 0, 'C', false);
		//Write contact1 phone
		$pdf->setXY($col + 23 + 72, $row);
		$text = $this->p($credential->contact1_phone);
		$pdf->multiCell(22, $height, $text, 0, 'C', false);
		//Write contact1 relation
		$pdf->setXY($col + 23 + 72 + 41, $row);
		$text = $this->p($credential->contact1_relation);
		$pdf->multiCell(17, $height, $text, 0, 'C', false);
		//Write contact2 name
		$row += $height;
		$pdf->setXY($col + 23, $row);
		$text = $this->p($credential->contact2_name);
		$pdf->multiCell(55, $height, $text, 0, 'C', false);
		//Write contact2 phone
		$pdf->setXY($col + 23 + 72, $row);
		$text = $this->p($credential->contact2_phone);
		$pdf->multiCell(22, $height, $text, 0, 'C', false);
		//Write contact2 relation
		$pdf->setXY($col + 23 + 72 + 41, $row);
		$text = $this->p($credential->contact2_relation);
		$pdf->multiCell(17, $height, $text, 0, 'C', false);
		//Write Faculty
		$faculty = DB::select("select faculty from faculty where cand_id = ".$credential->id);
		$row += $height;
		//Write Faculty 1
		$text = $this->p($faculty[0]->faculty);
		$pdf->setXY($col + 23, $row);
		$pdf->multiCell(38, $height, $text, 0, 'C', false);
		//Write Faculty 2
		$text = $this->p($faculty[1]->faculty);
		$pdf->setXY($col + 23 + 50, $row);
		$pdf->multiCell(38, $height, $text, 0, 'C', false);
		//Write Faculty 3
		$row += $height;
		$text = $this->p($faculty[2]->faculty);
		$pdf->setXY($col + 23, $row);
		$pdf->multiCell(38, $height, $text, 0, 'C', false);
		//Write Faculty 4
		$text = $this->p($faculty[3]->faculty);
		$pdf->setXY($col + 23 + 50, $row);
		$pdf->multiCell(38, $height, $text, 0, 'C', false);
		//Write sign name
		$row += 3*$height + 2;
		$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->setXY($col + 23 + 70, $row);
		$pdf->multiCell(48, $height, $text, 0, 'C', false);
		//Write parent approve student name
		$row += 5*$height + 2.5;
		$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->setXY($col + 23 + 80, $row);
		$pdf->multiCell(46, $height, $text, 0, 'C', false);
		//Write parent sign text
		$row += 9*$height + 3.8;
		$text = $this->p("ผู้ปกครองของ " . $credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->setXY($col + 23 + 70, $row);
		$pdf->multiCell(48, $height, $text, 0, 'C', false);

		//------------Page 4---------------
		$pdf->addPage();
		$pdf->useTemplate($pages[3], 0, 0);

		//Write Name Header
		$pdf->setXY(78 , 12);
		$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->multiCell(56, $height, $text, 0, 'C', false);

		//Write course
		$row = 21.75*$height;
		$course_num = $credential->course;
		if($course_num == 0) $course = 'วิทย์ ม.4 ขึ้น ม.5';
		else if($course_num == 1) $course = 'วิทย์ ม.5 ขึ้น ม.6';
		else if($course_num == 2) $course = 'ศิลป์ภาษา';
		else if($course_num == 3) $course = 'ศิลป์คำนวณ';
		$text = $this->p($course);
		$pdf->setXY($col + 25, $row);
		$pdf->multiCell(46, $height, $text, 0, 'C', false);
		//Write sign name page 4
		$row += 3*$height + 2;
		$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->setXY($col + 23 + 70, $row);
		$pdf->multiCell(48, $height, $text, 0, 'C', false);


		$pdf->addPage();
		$pdf->useTemplate($pages[4], 0, 0);
		//Write Name Header
		$pdf->setXY(78 , 12);
		$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->multiCell(56, $height, $text, 0, 'C', false);

		$pdf->output();

		exit;

		/*
		$pdf = new FPDF();
		$pdf->AddPage();
		
		$pdf->AddFont('angsa','','angsa.php');
		$pdf->AddFont('angsa','B','angsab.php');

		$pdf->SetFont('angsa','',16);
		$pdf->Cell(40,10, $this->p('สวัสดีครับ'));
		$pdf->Output();
		*/


	}
 
	//just for debugging
	public function getLogout() {
		Auth::logout();
		return 'logged out';
	}
}