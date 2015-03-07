<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Main_Controller {

	function __construct() {
        parent::__construct('users', 'userid');
    }
	
	public function index()
	{	
		/* Set the page title, heading, and content here */
		$this->data["pagetitle"] = "RedScribeIt";
		$this->data["heading"] = "RedScribeIt";
		$this->data["menu"] = "menu";
		$this->data["content"] = "main";
		
		/* Do avatar setup */
		session_Start();
		$user = array();
		$user = $this->users->get($_SESSION["id"]); 	//This needs to get session var. 
		$this->data["uname"] = $_SESSION["user"];
		$this->data["avatar"] = "assets/images/" . $user->avatar;
		/* End avatar setup */
		
		/* calls Render in the Main_Controller 
		see MY_Controller.php in ./core */
		
		$this->load->model("subscription");
		$this->createSubContent();
		$this->render();
		
	}
	
	//Calls to Subscription model to populate page with subscription data. 
	private function createSubContent()
	{
		$urlssarray = array();
		$urlssarray = $this->subscription->getUserSubs($_SESSION["id"]);
		$mysubs = array();
		
		if ($urlssarray != null) 
		{
			foreach ($urlssarray as $url) 
			{
				$mysubs[] = array("sub_details" => $this->createSingleSub($url));
				//Blank out message; only required for errors. See below. 
				$this->data["message"] = null; 
			}
		}
		else 
		{
			$this->data["message"] = "You have no subs to display. Please use manage to add subs.";
		}
		$this->data["subscriptions"] = $mysubs;
	}
	
	//Sets up view data for a single sub. 
	function createSingleSub($url) {
	
		$posts = $this->subscription->getSubPosts($url);
		$myposts = array();
		$mysuburl = array("sub_url" => $url);
		foreach ($posts as $post) 
		{
			$myposts[] = array(
				"post_url" => $post["permalink"], 
				"post_link" => $post["permalink"],
				"post_title" => $post["title"]
			);
			
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