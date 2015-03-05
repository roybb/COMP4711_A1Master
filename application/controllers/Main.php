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
		
		/* Set user avatar img here */
		$this->data["avatar"] = "assets/images/null.jpg";
		$this->data["uname"] = "NULLUSER";
		
		/* calls Render in the Main_Controller 
		see MY_Controller.php in ./core */
		
		$this->load->model("subscription");
		$this->createSubContent();
		$this->render();
		
	}
	
	private function createSubContent()
	{
		$urlssarray = array();
		$urlssarray = $this->subscription->getUserSubs();
		$mysubs = array();
		foreach ($urlssarray as $url) 
		{
			$mysubs[] = array("sub_details" => $this->createSingleSub($url));
		}
		$this->data["subscriptions"] = $mysubs;
	}
	
	function createSingleSub($url) {
	
		$posts = $this->subscription->getSubPosts($url);
		$myposts = array();
		$mysuburl = array("sub_url" => $url);
		foreach ($posts as $post) 
		{
			$myposts[] = array("post_url" => $post, "post_link" => $post);
			
		}
		$parms = array("posts" => $myposts, "sub_url" => $url["sub"]);
		return $this->parser->parse("_subscription", $parms, true);
	}
	
	function debugArray($array)
	{
		echo '<pre>'; 
		print_r($array); 
		echo '</pre>';
	}
}