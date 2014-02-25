<?php 

class AdminController extends BaseController {
	//##########################################################
	//CSV Library
	//##########################################################
	private function csvHeader($filename) {
		$now = gmdate("D, d M Y H:i:s");
		header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
		header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
		header("Last-Modified: {$now} GMT");

    // force download  
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");

    // disposition / encoding on response body
		header("Content-Disposition: attachment;filename={$filename}_" . date("Y-m-d") . '.csv');
		header("Content-Transfer-Encoding: binary");
	}
	private function toCSV($arr) {
		if(count($arr) == 0) {
			return null;
		}
		ob_start();
		$df = fopen('php://output', 'w');
		fputcsv($df, array_keys(reset($arr)));
		foreach($arr as $row) {
			fputcsv($df, $row);
		}
		fclose($df);
		return ob_get_clean();
	}




	public function getIndex() {
		return View::make('admin.index');
	}

	public function getCsv() {
		$arr = Candidate::all();

		$school_plan = array(
			0 => 'วิทย์-คณิต',
			1 => 'ศิลป์-คำนวณ',
			2 => 'ศิลป์-ภาษา');

		$shirt_size = array(
			0 => 'S',
			1 => 'M',
			2 => 'L',
			3 => 'XL',
			4 => 'XXL');

		$course = array(
			0 => 'วิทย์ ม.4 ขึ้น ม.5',
			1 => 'วิทย์ ม.5 ขึ้น ม.6',
			2 => 'ศิลป์ภาษา',
			3 => 'ศิลป์คำนวณ');

		$parent_income = array(
			0 => 'น้อยกว่า 10,000',
			1 => '10,000 - 19,999',
			2 => '20,000 - 29,999',
			3 => '30,000 - 39.999',
			4 => 'มากกว่า 40,000');

		$result = array();
		foreach($arr as $each) {
			$th = &$result[];
			$th = $each->toArray();

			$province = Province::find($th['province'])->toArray();
			$th['province'] = $province['PROVINCE_NAME'];

			$amphur = Amphur::find($th['amphur'])->toArray();
			$th['amphur'] = $amphur['AMPHUR_NAME'];

			$tambol = District::find($th['tambol'])->toArray();
			$th['tambol'] = $tambol['DISTRICT_NAME'];

			$th['school_plan'] = $school_plan[$th['school_plan']];
			$th['shirt_size'] = $shirt_size[$th['shirt_size']];
			$th['course'] = $course[$th['course']];
			$th['parent_income'] = $parent_income[$th['parent_income']];

			$faculties = $each->faculties->toArray();
			foreach($faculties as $idx => $fac) {
				$th['faculty_' .($idx + 1)] = $fac['faculty'];
			}
		}


		$this->csvHeader('pcu_contestants');
		//return var_dump($result);
		echo $this->toCSV($result);
		die();
	}

	public function getLogin() {
		return View::make('admin.login');
	}

	public function postLogin() {
		$secret_username = 'pcu_admin';
		$secret_password = '17_pcu';

		if(Input::get('username') == $secret_username
			and Input::get('password') == $secret_password) {

			Session::put('admin.is', true);

			return Redirect::to('admin');

		} else {
			return Redirect::to('admin/login');
		}
	}

	public function getLogout() {
		Session::forget('admin');
		return Redirect::to('admin/login');
	}

}
