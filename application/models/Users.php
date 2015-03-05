<?php

class Users extends CI_Model {
	function __construct()
	{
		parent::__construct('users', 'id');	
	}

        function adduser($data)
        {
            $data=array(
                'username'=>$this->input->post('username'),
                'password'=>md5($this->input->post('password')),
                
            );
            
            $this->db->insert('users', $data);
        }
}

