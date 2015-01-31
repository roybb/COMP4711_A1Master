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
		$this->data["content"] = "register";
		
		$this->render_register(); 
	}
}