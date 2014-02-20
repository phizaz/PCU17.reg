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

		$online = true;
		$before = $after = false;
		if(!Config::get('app.testing'))
			if(time() <= Config::get('app.start_time') ) {
				$online = false;
				$before = true;
			} else if(time() >= Config::get('app.end_time') ) {
				$online = false;
				$after = true;
			}

		return View::make('cover', array(
			'title' => Config::get('app.title'),
			'url' => $url,
			'fail' => $fail,
			'online' => $online, 
			'before' => $before,
			'after' => $after
			));
	}
}