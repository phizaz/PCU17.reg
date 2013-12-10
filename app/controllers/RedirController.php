<?php 
class RedirController extends BaseController {
	public function getIndex() {
		//Hit Counting here!
		//collect information about the requester, time, ip, etc...
		return Redirect::to(Input::get('url'));
	}
}
 ?>