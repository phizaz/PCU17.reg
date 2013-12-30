<?php 
//This controller shows the cover page, conditions, agreements
//When user accepts go to register page.
class CoverController extends BaseController{
	function getIndex() {
		//Just clear the way for the next user.
		Auth::logout();
		Session::forget('credential');
		Session::put('agree', true);

		
		return View::make('cover');
	}
}