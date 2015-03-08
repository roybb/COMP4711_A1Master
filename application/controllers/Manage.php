<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Manage extends Main_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->helper('formfields');
    }
    
    public function index() {
        
             /* Set the page title, heading, and content here */
            $this->data["pagetitle"] = "RedScribeIt Manage";
            $this->data["heading"] = "Manage Subscriptions";
            $this->data["menu"] = "menu";
            $this->data["content"] = 'manage';
            
            $this->load->model("subscription");
			
			/* Do avatar setup */
			session_Start();
			$user = array();
			$user = $this->users->get($_SESSION["id"]); 	//This needs to get session var. 
			$this->data["uname"] = $_SESSION["user"];
			$this->data["avatar"] = "assets/images/" . $user->avatar;
			/* End avatar setup */
		
            /* calls Render in the Main_Controller 
            see MY_Controller.php in ./core */
            $this->render();  
    }
    function confirm() {
        session_Start();
		$record = $this->subscription->create();
        $record->url = $this->input->post('furl');
        $record->userid = $_SESSION['id'];
        $this->subscription->add($record);
        redirect('/manage');
    }
}