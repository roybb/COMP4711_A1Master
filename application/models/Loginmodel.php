<?php

class Loginmodel extends MY_Model {
	
	public function __construct()
	{
		parent::__construct('users', 'userid');
	}
	
    function validateLogin() 
    {
        $testing = $this->get('1');
        return $testing;
    }

}
