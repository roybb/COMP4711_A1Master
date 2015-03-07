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
        
        public function checkDuplicate($post_uname) {
            $this->db->where('uname', $post_uname);

            $query = $this->db->get('users');

            $count_row = $query->num_rows();

            if ($count_row > 0) {
              //if count row return any row; that means you have already have the same username in the database
                return FALSE;
            } else {
              // doesn't return any row means database doesn't have this username yet
                return TRUE;
            }
        }
}

