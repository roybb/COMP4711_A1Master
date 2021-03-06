<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Manage extends Main_Controller {

    function __construct() {
        parent::__construct();
        $this->errors = array();
    }
    
    public function index() {
        
             /* Set the page title, heading, and content here */
            $this->data["pagetitle"] = "RedScribeIt Manage";
            $this->data["heading"] = "Manage Subscriptions";
            $this->data["menu"] = "menu";
            $this->data['manage'] = 'manage';
            
            $this->load->model("subscription");
			
			/* Do avatar setup */
			session_Start();
			$user = array();
			$user = $this->users->get($_SESSION["id"]); 	//This needs to get session var. 
			$this->data["uname"] = $_SESSION["user"];
			$this->data["avatar"] = "assets/images/" . $user->avatar;
			/* End avatar setup */
		
             $message = '';
             if (count($this->errors) > 0)
             {
                 foreach($this->errors as $booboo)
                     $message .= $booboo ;
             }
             $this->data['message'] = $message;
             
             $this->data["content"] = $this->parser->parse($this->data["manage"], $this->data, true);
             
            /* calls Render in the Main_Controller 
            see MY_Controller.php in ./core */
            $this->render_manage();  
    }
    function confirm() {
        
        session_Start();
        
        $record = $this->subscription->create();
        //get subscription url from form
        $record->url = $this->input->post('furl');
        $record->userid = $_SESSION['id'];
        
        /*confirm user does not have more than 5 subscriptions*/
        $ret = $this->subscription->validateSubscription($record->userid);
        if($ret == FALSE)
           $this->errors[] = 'Maximum number of subscriptions is 5'; 
        else {   
            $this->subscription->add($record);
        }
        if(count($this->errors) > 0) {
            session_abort();
            $this->index();
        }
        else
            redirect('/manage');
    }
}