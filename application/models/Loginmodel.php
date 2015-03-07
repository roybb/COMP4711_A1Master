<?php

class Loginmodel extends MY_Model {
	
	public function __construct()
	{
		parent::__construct('users', 'userid');
	}
	
    //returns true or false if the user authentication was successful
    function validateLogin($userid, $passwd) 
    {
        $ret = array();
        $user = $this->some('uname', $userid);
        
        if(count($user) == 0)
            $ret = FALSE;
        else
        {
            if ($user[0]->pword == $passwd)
                $ret['validation'] = TRUE;
            else
                $ret['validation'] = FALSE;
        }
           
        return $ret;
    }
    
    //gets the user info from the database
    function getUser($userid)
    {
        $user = $this->some('uname', $userid);
        $ret = array('name' => $user[0]->uname, 'role' => $user[0]->role, 'id' => $user[0]->userid);
        return $ret;
    }

}
