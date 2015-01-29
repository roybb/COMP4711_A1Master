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
		$post = array();
		$post[] = array( "sub" => "http://google.com", "post" => "This is the post");
		$post[] = array( "sub" => "http://google.com", "post" => "This is the post 2");
		$post[] = array( "sub" => "http://google.com", "post" => "This is the post 3");
		$post[] = array( "sub" => "http://google.com", "post" => "This is the post 4");
		$this->data["subscriptions"] = $post;
	}
}