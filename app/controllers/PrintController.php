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
		$row = 74.5;
		$col = 25;
		$height = 6.5;

		// for($i = 0; $i < 5; $i++){
		// 	$pdf->addPage();
		// 	$pdf->useTemplate($pages[$i], 0, 0);
		// 	//Write Name Header
		// 	$pdf->SetFont('sarabun', '',12);
		// 	$pdf->setXY(78 , 11.5);
		// 	$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		// 	$pdf->multiCell(56, $height, $text, 0, 'C', false);

		// 	$pdf->SetFont('sarabun','',14);
		// }

		//------------ Page 6 -------------
		$pdf->addPage();
		$pdf->useTemplate($pages[5], 0, 0);

		

		//Write Name Header
		$pdf->SetFont('sarabun', '',12);
		$pdf->setXY(78 , 11.5);
		$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->multiCell(56, $height, $text, 0, 'C', false);

		$pdf->SetFont('sarabun','',14);
		//Write Name
		$pdf->setXY($col,$row);
		$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->multiCell(56, $height, $text, 0, 'C', false);
		//Write National ID
		$pdf->setXY($col + 90, $row);
		$text = substr($credential->national_id , 0, 1) . '-' . substr($credential->national_id , 1, 4) . '-' . substr($credential->national_id , 5, 5) . '-' . substr($credential->national_id , 10, 2) . '-' . substr($credential->national_id , 12, 1);
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
		if($text == "") $text = "-";
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
		if($text == "") $text = "-";
		else if(substr($credential->phone_home, 0, 2) == "02") $text = substr($credential->phone_home, 0, 2) . '-' . substr($credential->phone_home, 2);
		else $text = substr($credential->phone_home, 0, 3) . '-' . substr($credential->phone_home, 3);
		$pdf->multiCell(41, $height, $text, 0, 'C', false);
		//Write Mobile Tel
		$pdf->setXY($col + 41 + 17, $row);
		$text = substr($credential->phone_mobile, 0, 2) . '-' . substr($credential->phone_mobile, 2);	
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
		$pdf->setXY($col + 25 + 32 + 39 + 9.5, $row);
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
		$text = substr($this->p($credential->contact1_phone), 0, 2) . '-' . substr($this->p($credential->contact1_phone), 2);
		$pdf->multiCell(22, $height, $text, 0, 'C', false);
		//Write contact1 relation
		$pdf->setXY($col + 23 + 72 + 40, $row);
		$text = $this->p($credential->contact1_relation);
		$pdf->multiCell(17, $height, $text, 0, 'C', false);
		//Write contact2 name
		$row += $height;
		$pdf->setXY($col + 23, $row);
		$text = $this->p($credential->contact2_name);
		$pdf->multiCell(55, $height, $text, 0, 'C', false);
		//Write contact2 phone
		$pdf->setXY($col + 23 + 72, $row);
		$text = substr($this->p($credential->contact2_phone), 0, 2) . '-' . substr($this->p($credential->contact2_phone), 2);
		$pdf->multiCell(22, $height, $text, 0, 'C', false);
		//Write contact2 relation
		$pdf->setXY($col + 23 + 72 + 40, $row);
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
		if(sizeof($faculty) < 2) $text = "-"; 
		else $text = $this->p($faculty[1]->faculty);		
		$pdf->setXY($col + 23 + 50, $row);
		$pdf->multiCell(38, $height, $text, 0, 'C', false);
		//Write Faculty 3
		$row += $height;
		if(sizeof($faculty) < 3) $text = "-"; 
		else $text = $this->p($faculty[2]->faculty);		
		$pdf->setXY($col + 23, $row);
		$pdf->multiCell(38, $height, $text, 0, 'C', false);
		//Write Faculty 4
		if(sizeof($faculty) < 4) $text = "-"; 
		else $text = $this->p($faculty[3]->faculty);		
		if($text == "") $text = "-";
		$pdf->setXY($col + 23 + 50, $row);
		$pdf->multiCell(38, $height, $text, 0, 'C', false);
		//Write sign name
		$row += 2*$height + 3.5;
		$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->setXY($col + 23 + 70, $row);
		$pdf->multiCell(48, $height, $text, 0, 'C', false);
		//Write parent approve student name
		$row += 4*$height + 5.5;
		$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->setXY($col + 23 + 80, $row);
		$pdf->multiCell(46, $height, $text, 0, 'C', false);
		//Write parent sign text
		$row += 7*$height + 11;
		$text = $this->p("ผู้ปกครองของ " . $credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->setXY($col + 23 + 63, $row);
		$pdf->multiCell(60, $height, $text, 0, 'C', false);

		//------------Page 7---------------
		$pdf->addPage();
		$pdf->useTemplate($pages[6], 0, 0);

		//Write Name Header
		$pdf->SetFont('sarabun','',12);
		$pdf->setXY(78 , 11.5);
		$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->multiCell(56, $height, $text, 0, 'C', false);

		$pdf->SetFont('sarabun','',14);
		//Write course
		$row = 20.75*$height + 2;
		$course_num = $credential->course;
		if($course_num == 0) $course = 'วิทย์ ม.4 ขึ้น ม.5';
		else if($course_num == 1) $course = 'วิทย์ ม.5 ขึ้น ม.6';
		else if($course_num == 2) $course = 'ศิลป์ภาษา';
		else if($course_num == 3) $course = 'ศิลป์คำนวณ';
		$text = $this->p($course);
		$pdf->setXY($col + 25, $row);
		$pdf->multiCell(46, $height, $text, 0, 'C', false);
		//Write sign name page 4
		$row += 4*$height ;
		$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->setXY($col + 23 + 70, $row);
		$pdf->multiCell(48, $height, $text, 0, 'C', false);

		//------------- Page 8 --------------------
		$pdf->addPage();
		$pdf->useTemplate($pages[7], 0, 0);
		//Write Name Header
		$pdf->SetFont('sarabun','',12);
		$pdf->setXY(78 , 11.5);
		$text = $this->p($credential->name_prefix . $credential->name_first . " " . $credential->name_last);
		$pdf->multiCell(56, $height, $text, 0, 'C', false);

		$pdf->SetFont('sarabun','',14);
		$pdf->output();

		exit;

		/*
		$pdf = new FPDF();
		$pdf->AddPage();
		
		$pdf->AddFont('angsa','','angsa.php');
		$pdf->AddFont('angsa', '','angsab.php');

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