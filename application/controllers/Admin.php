<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin extends Main_Controller {

    function __construct() {
        parent::__construct();
        $this->errors = array();
        $this->load->helper('formfields');
    }
    
    public function index() {
        
             /* Set the page title, heading, and content here */
            $this->data["pagetitle"] = "RedScribeIt Admin Page";
            $this->data["heading"] = "Admin Page";
            $this->data["menu"] = "menu";
            $this->data["content"] = 'admintable';
            $this->data["users"] = $this->users->all();
		
            /* calls Render in the Main_Controller 
            see MY_Controller.php in ./core */
            $this->render_admin();  
    }
    
    function add() {
        $user = $this->users->create();
        $this->present($user);
    }
    
    function present($user) {
        $this->data['fuserid'] = makeTextField('User ID', 'userid', $user->userid, "Unique user identifier, system-assigned",16,10,true);
        $this->data['funame'] = makeTextField('Username', 'uname', $user->uname,"24 characters max" ,24);
        $this->data['fpword'] = makeTextField('Password', 'pword', $user->pword,"24 characters max", 24);
        $this->data['frole'] = makeTextField('Role', 'role', $user->role, "8 characters max", 8);
        $this->data['favatar'] = makeTextField('Avatar', 'avatar', $user->avatar, "64 characters max", 64);
        $this->data['fsubmit'] = makeSubmitButton('Validate User', "Click here to validate the user data", 'btn-success');
        $this->data['content'] = 'user_edit';
        
        /* Set the page title, heading, and content here */
        $this->data["pagetitle"] = "RedScribeIt Admin Page";
        $this->data["heading"] = "Admin Page";
        $this->data["menu"] = "menu";
        
        $message = '';
        if (count($this->errors) > 0) {
            foreach ($this->errors as $booboo)
                $message .= $booboo . '<br/>';
        }
        $this->data['message'] = $message;
  
        $this->render_admin();
    }
    
    function confirm() {
        $record = $this->users->create();
        
        // Extract submitted fields
        $record->uname = $this->input->post('uname');
        $record->pword = $this->input->post('pword');
        $record->role = $this->input->post('role');
        $record->avatar = $this->input->post('avatar');
        
        if (empty($record->avatar)) {
            $record->avatar = 'null.jpg';
        }
        
        if (empty($record->uname) || empty($record->pword) || empty($record->role) ) {
            $this->errors[] = 'You must enter a username, password and role.';
        }
        
        if (count($this->errors) > 0) {
            $this->present($record);
            return; // return to prevent saving bad entry
        }
        
        // Save stuff
        if (empty($record->userid)) {
            $this->users->add($record);
        } else {
            $this->users->update($record);
        }
        
        redirect('/admin');
    }
}