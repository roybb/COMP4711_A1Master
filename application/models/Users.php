<?php

class Users extends MY_Model {
	function __construct()
	{
            parent::__construct('users', 'userid');
	}

        function adduser($data)
        {
            $this->db->insert('users', $data);
        }
}

