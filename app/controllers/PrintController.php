<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PrintController extends BaseController {
	public function getReturn() {
		return View::make('returnForm');
	}

	public function postReturn() {
		$national_id = Input::get('national_id');
		try {
			$candidate = Candidate::where('national_id', '=', $national_id)->firstOrFail();
			Auth::login($candidate);
			return Redirect::intended('print');
		} catch (ModelNotFoundException $e) {
			Session::flash('fail', true);
			return Redirect::to('print/return');
		}
	}

	public function getIndex() {
		return View::make('print', array(
			'credential' => Auth::user()));
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

		//Write Name
		$pdf->setXY($col,$row);
		$text = $this->p($credential->name_first . ' ' . $credential->name_last);
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
		$pdf->multiCell(16, $height, $text, 0, 'C', false);
		if ($text == "") {
			$text = "-";
		}
		//Write Disease
		$pdf->setXY($col + 10 + 10 + 16 + 19, $row);
		$text = $credential->disease;
		$pdf->multiCell(26, $height, $text, 0, 'C', false);
		if ($text == "") {
			$text = "-";
		}
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
		$text = $this->p($credential->Address . ' ถนน ' . $credential->road . ' หมู่ ' . $credential->moo);
		$getdata = DB::table('district')->select('DISTRICT_NAME')->where('DISTRICT_ID' , '=' , $credential->tambol)->get();
		$text .= $this->p(' ตำบล/แขวง ' . $getdata[0]->DISTRICT_NAME);
		$getdata = DB::table('amphur')->select('AMPHUR_NAME')->where('AMPHUR_ID' , '=' , $credential->amphur)->get();
		$text .= $this->p(' อำเภอ/เขต ' . $getdata[0]->AMPHUR_NAME);
		$getdata = DB::table('province')->select('PROVINCE_NAME')->where('PROVINCE_ID' , '=' , $credential->province)->get();
		$text .= $this->p(' จังหวัด ' . $getdata[0]->PROVINCE_NAME);
		$text .= $credential->zip_code;
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
		$text = $this->p('ม.' . $credential->school_plan);
		$pdf->multiCell(15, $height, $text, 0, 'C', false);

		//And much more

		$pdf->addPage();
		$pdf->useTemplate($pages[3], 0, 0);

		$pdf->addPage();
		$pdf->useTemplate($pages[4], 0, 0);

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