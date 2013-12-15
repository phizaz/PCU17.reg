<?php

class ValidatorLib extends BaseController {
	public function isThai($attr, $val, $params) {
		//Write code here to check if $val contains only Thai alphabets.
		$val = iconv(  'UTF-8','TIS-620', $val);
		if(preg_match("/^[ก-ฮ]+$/",$val)){ 
		 return true;
		} else {
		 return false;
		}
	}

	public function isNationalId($attr, $val, $params) {
		//Write code here to check if $val is the pattern of Thai National Id.
		return true;
	}

	public function isAddress($attr, $val, $params){
		if(preg_match("#/(\d+)$#",$val)){ 
		 return true;
		} else {
		 return false;
		}

	}
}