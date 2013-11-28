<?php 
class ServiceController extends BaseController {
	// All the services should be stated here!
	// All the functions should return as json type.

	public function getProvince() {
		$provinces = DB::table('province')->select('PROVINCE_ID', 'PROVINCE_NAME')->get();
		return json_encode($provinces);
	}

	public function getAmphur($province_id) {
		$amphurs = DB::table('amphur')->select('AMPHUR_ID', 'AMPHUR_NAME')->where('PROVINCE_ID', $province_id)->get();
		return json_encode($amphurs);
	}

	public function getTambol($amphur_id) {
		$tambols = DB::table('district')->select('DISTRICT_ID', 'DISTRICT_NAME')->where('AMPHUR_ID', $amphur_id)->get();
		return json_encode($tambols);
	}
}
 ?>