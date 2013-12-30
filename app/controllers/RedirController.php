<?php 
class RedirController extends BaseController {
	public function getIndex() {
		//Hit Counting here!
		//collect information about the requester, time, ip, etc...
		$url = Input::get('url');
		$from = Input::get('from');
		$ip = Request::getClientIp();

		$clicker = new Clicker;
		$clicker->url = $url;
		$clicker->from = $from;
		$clicker->ip = $ip;
		$clicker->save();

		return Redirect::to($url);
	}
}
 