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
		$subscriptions["subscriptions"]["0"] = "Bob.com";
		$subscriptions["subscriptions"]["1"] = "George.com";
		//$subscriptions["subscriptions"]["posts"] = "posts go here";
		//$subscriptions["subscriptions"]["sub2"] = "Bob.com";
		//$subscriptions["subscriptions"]["posts2"] = "posts go here";
		$this->data["subscriptions"] = $subscriptions;
		
		echo '<pre>';
		print_r($subscriptions);
		echo '</pre>';
		
	}
}