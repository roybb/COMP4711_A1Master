<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin extends Main_Controller {

    function __construct() {
        parent::__construct();
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
        $this->data['fuserid'] = makeTextField('User ID', 'userid', $user->userid);
        $this->data['funame'] = makeTextField('Username', 'uname', $user->uname);
        $this->data['fpword'] = makeTextField('Password', 'pword', $user->pword);
        $this->data['frole'] = makeTextField('Role', 'role', $user->role);
        $this->data['favatar'] = makeTextField('Avatar', 'avatar', $user->avatar);
        $this->data['content'] = 'user_edit';
        
        /* Set the page title, heading, and content here */
        $this->data["pagetitle"] = "RedScribeIt Admin Page";
        $this->data["heading"] = "Admin Page";
        $this->data["menu"] = "menu";
        $this->render_admin();
    }
}