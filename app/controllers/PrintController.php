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

	//This function generate the PDF file.
	public function getPdf(){
		//Write PDF Generating code here!
	}

	private function p($text){
		return iconv('utf-8', 'cp874', $text);
	}
	public function getFpdf(){
		$path = app_path() . '/libs';
		require($path . '/fpdf.php');
		require($path . '/fpdi/fpdi.php');
		define('FPDF_FONTPATH', $path . '/font/');

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
		$text = $this->p('กรพัฒน์ ปรีชากุล');
		$pdf->multiCell(56, $height, $text, 0, 'C', false);
		//Write National ID
		$pdf->setXY($col + 90, $row);
		$text = '1-1111-11111-11-1';
		$pdf->multiCell(42, $height, $text, 0, 'C', false);
		//Write Nickname
		$row += $height;
		$col += 5;
		$pdf->setXY($col, $row);
		$text = $this->p('ต้า');
		$pdf->multiCell(14, $height, $text, 0, 'C', false);
		//Write Age
		$pdf->setXY($col + 14 + 7.5, $row);
		$text = '19';
		$pdf->multiCell(6, $height, $text, 0, 'C', false);
		//Write Birth Date
		$pdf->setXY($col + 14 + 8 + 5 + 28, $row);
		$text = '14/02/2537';
		$pdf->multiCell(23, $height, $text, 0, 'C', false);
		//Write Religion
		$pdf->setXY($col + 14 + 8 + 5 + 28 + 23 + 11, $row);
		$text = $this->p('พุทธ');
		$pdf->multiCell(13, $height, $text, 0, 'C', false);
		//Write Blood Group
		$pdf->setXY($col + 14 + 8 + 5 + 28 + 23 + 11 + 27, $row);
		$text = 'O';
		$pdf->multiCell(11, $height, $text, 0, 'C', false);
		//Write Food Allergies
		$row += $height;
		$col += 4;
		$pdf->setXY($col, $row);
		$text = '-';
		$pdf->multiCell(10, $height, $text, 0, 'C', false);
		//Write Drug
		$pdf->setXY($col + 10 + 10, $row);
		$text = '-';
		$pdf->multiCell(16, $height, $text, 0, 'C', false);
		//Write Disease
		$pdf->setXY($col + 10 + 10 + 16 + 19, $row);
		$text = '-';
		$pdf->multiCell(26, $height, $text, 0, 'C', false);
		//Write Facebook
		$row += $height;
		$col += 2;
		$pdf->setXY($col, $row);
		$text = $this->p('Konpat Ta Preechakul');
		$pdf->multiCell(36, $height, $text, 0, 'C', false);
		//Write Email
		$pdf->setXY($col + 36 + 12, $row);
		$text = $this->p('the.akita.ta@gmail.com');
		$pdf->multiCell(49, $height, $text, 0, 'C', false);
		//Write Address
		$row += $height;
		$col -= 9;
		$pdf->setXY($col, $row);
		$text = $this->p('218/238 คอนโด Rhythm รัชดา-ห้วยขวาง ถนนรัชดาภิเษก เขตห้วยขวาง แขวงห้วยขวาง กรุงเทพ ฯ 10310');
		$pdf->multiCell(130, $height, $text, 0, 'L', false);
		//Write Home Tel
		$row += 2 * $height;
		$col += 14;
		$pdf->setXY($col, $row);
		$text = '';
		$pdf->multiCell(41, $height, $text, 0, 'C', true);
		//Write Mobile Tel
		$pdf->setXY($col + 41 + 17, $row);
		$text = '';
		$pdf->multiCell(33, $height, $text, 0, 'C', true);
		//Write Salary
		$row += $height;
		$col += 12;
		$pdf->setXY($col, $row);
		$text = '';
		$pdf->multiCell(29, $height, $text, 0, 'C', true);
		//Write Class
		$pdf->setXY($col + 29 + 55, $row);
		$text = '';
		$pdf->multiCell(15, $height, $text, 0, 'C', true);

		//And much more

		$pdf->addPage();
		$pdf->useTemplate($pages[3], 0, 0);

		$pdf->addPage();
		$pdf->useTemplate($pages[4], 0, 0);

		$pdf->output();

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