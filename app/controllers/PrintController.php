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

	//just for debugging
	public function getLogout() {
		Auth::logout();
		return 'logged out';
	}
}