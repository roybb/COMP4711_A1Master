<?php

class Users extends CI_Model {

	protected $subs = array();
	
	function __construct()
	{
		parent::__construct('users', 'id');	
	}

        function adduser($data)
        {
            $this->db->insert('users', $data);
        }
}

