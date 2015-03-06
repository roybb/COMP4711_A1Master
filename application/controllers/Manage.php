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
		
            /* calls Render in the Main_Controller 
            see MY_Controller.php in ./core */
            $this->render();  
    }
    function confirm() {
        $record = $this->subscription->create();
        $record->url = $this->input->post('furl');
        $record->userid = 1;
        $this->subscription->add($record);
        //$this->subscription->addSub();
        redirect('/manage');
    }
}