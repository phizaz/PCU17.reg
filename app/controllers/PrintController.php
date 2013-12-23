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
		require(app_path() . '/libs/fpdf.php');
		define('FPDF_FONTPATH', app_path() . '/libs/font/');

		$pdf = new FPDF();
		$pdf->AddPage();
		
		$pdf->AddFont('angsa','','angsa.php');
		$pdf->AddFont('angsa','B','angsab.php');

		$pdf->SetFont('angsa','',16);
		$pdf->Cell(40,10, $this->p('สวัสดีครับ'));
		$pdf->Output();
	}

	//just for debugging
	public function getLogout() {
		Auth::logout();
		return 'logged out';
	}
}