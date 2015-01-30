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
		
		/* calls Render in the Main_Controller 
		see MY_Controller.php in ./core */
		
				
		$this->renderSubs();
		$this->render();
		
	}
	
	private function renderSubs()
	{
		$this->load->model("subscription");
		$subscriptions = array();
		$subscriptions["subscriptions"]["sub"] = "Bob.com";
		$subscriptions["subscriptions"]["posts"] = "George.com";
		$this->data["subscriptions"] = $subscriptions;
		
		//TEMP - Debugging the array
		echo '<pre>';
		print_r($subscriptions);
		echo '</pre>';
		
	}
}