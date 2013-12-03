<?php

class ValidatorLib extends BaseController {
	public function isThai($attr, $val, $params) {
		//Write code here to check if $val contains only Thai alphabets.
		return $val == 'thai';
	}

	public function isNationalId($attr, $val, $params) {
		//Write code here to check if $val is the pattern of Thai National Id.
		return true;
	}
}