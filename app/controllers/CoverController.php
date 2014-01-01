<?php 
//This controller shows the cover page, conditions, agreements
//When user accepts go to register page.
class CoverController extends BaseController{
	function getIndex() {
		//Just clear the way for the next user.
		Auth::logout();
		Session::forget('credential');
		Session::put('agree', true);
		if(Session::has('fail')) $fail = true;
		else $fail = false;

		$url = URL::to('');
		return View::make('cover', array(
			'url' => $url,
			'fail' => $fail));
	}
}