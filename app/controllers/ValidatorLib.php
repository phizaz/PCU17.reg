<?php

class ValidatorLib extends BaseController {
	public function isThai($attr, $val, $params) {
		//Write code here to check if $val contains only Thai alphabets.
		$val = iconv(  'UTF-8','TIS-620', $val);
		if(preg_match("/^[[\xA1-\xF9\s]+$/",$val)){ 
		 return true;
		} else {
		 return false;
		}
	}

	public function isNationalId($attr, $val, $params) {
		//Write code here to check if $val is the patternx of Thai National Id.
		if(strlen($val)==13 && is_numeric($val))
			return true;
		else return false;
	}

	public function isAddress($attr, $val, $params){
		if(preg_match("/^([1-9]{0,1})([0-9]{1})(\/[0-9])?$/",$val)){ 
		 return true;
		} else {
		 return false;
		}

	}

	public function isZipcode($attr, $val, $params){
		if(strlen($val)==5 && is_numeric($val))
			return true;
		else return false;

	}

	public function isPhone($attr, $val, $params){
		$val = preg_replace('/[^0-9]/', '', $val);
		if(strlen($val) == $params[0]) {
			return true;
		}
		return false;

	}

	//VAL MUST BE CONCATINATED
	public function uniqueName($attr, $val, $pararms) {
		$candidate = Candidate::whereRaw('concat(name_first, name_last) = ?', array($val))->count();
		return $candidate == 0;
	}
}