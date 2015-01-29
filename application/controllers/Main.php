<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Main_Controller {

	function __construct() {
        parent::__construct();
    }
	
	public function index()
	{	
		/* Set the page title, heading, and content here */
		$this->data["pagetitle"] = "RedScribeIt";
		$this->data["heading"] = "RedScribeIt";
		$this->data["menu"] = "menu";
		$this->data["content"] = "main";
		
		$this->load->model('subscription');
		$this->data["subs"] = $this->subscription->getUserSubs();
		
		/* calls Render in the Main_Controller 
		see MY_Controller.php in ./core */
		$this->render(); 
	}
}