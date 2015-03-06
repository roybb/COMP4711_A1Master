<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Main_Controller {

	function __construct() {
        parent::__construct();
    }
	
	public function index()
	{	
		/* Set the page title, heading, and content here */
		$this->data["pagetitle"] = "RedScribeIt User Registration";
		$this->data["heading"] = "RedScribeIt Registration";
		$this->data["menu"] = "menu";
                $this->data['register'] = 'register';
		$this->data["content"] = $this->parser->parse($this->data["register"], $this->data, true);
		
                $data = array(
                'Student_Name' => $this->input->post('dname'),
                'Student_Email' => $this->input->post('demail'),
                'Student_Mobile' => $this->input->post('dmobile'),
                'Student_Address' => $this->input->post('daddress')
                );
                
                /* calls render_register() in the Main_Controller 
                   , see MY_Controller.php in ./core */
		$this->render_register(); 
	}
}