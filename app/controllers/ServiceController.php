<?php 
class ServiceController extends BaseController {
	// All the services should be stated here!
	// All the functions should return as json type.

	public function getProvince() {
		//return all of the province. (~7 Kb.) <- very small.
		$provinces = DB::table('province')->select('PROVINCE_ID', 'PROVINCE_NAME')->get();
		return json_encode($provinces);
	}

	public function getAmphur() {
		//if no parameter, return all of them. (~92 Kb.) <- not too big.
		if(func_num_args() == 0) $amphurs = DB::table('amphur')->select('AMPHUR_ID', 'AMPHUR_NAME', 'PROVINCE_ID')->get(); 
		//if parameter presented, return in the scope.
		else $amphurs = DB::table('amphur')->select('AMPHUR_ID', 'AMPHUR_NAME')->where('PROVINCE_ID', func_get_arg(0))->get();
		return json_encode($amphurs);
	}

	public function getTambol() {
		//if no parameter, return all of them. (~1 Mb.) <- I think this is too big deal.
		if(func_num_args() == 0) $tambols = DB::table('district')->select('DISTRICT_ID', 'DISTRICT_NAME')->get();
		//if parameter presented, return in the scope. <- I prefer this one. 
		else $tambols = DB::table('district')->select('DISTRICT_ID', 'DISTRICT_NAME', 'AMPHUR_ID')->where('PROVINCE_ID', func_get_arg(0))->get();
		return json_encode($tambols);
	}
}
 ?>