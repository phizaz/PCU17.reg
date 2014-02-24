<?php

use Illuminate\Auth\UserInterface;

class Candidate extends Eloquent implements UserInterface{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'candidate';
	protected $guarded = array('day', 'month', 'year', 'faculty1', 'faculty2', 'faculty3', 'faculty4');


	public function faculties() {
		return $this->hasMany('Faculty', 'cand_id');
	}
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}
}