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
		
				
		//$this->renderSubs();
		$this->load->model("subscription");
		$this->createSubContent();
		$this->render();
		
	}
	
	private function renderSubs()
	{
		//$this->load->model("subscription");
		$urlssarray = array();
		$urlssarray = $this->subscription->getUserSubs();
		
		foreach ($urlssarray as $url)
		{
			$single = $this->parser->parse("_subscription", $url, false); // set true to stop breaking page
		}
		$this->data["subscriptions"] = $single;		
	}
	
	private function createSubContent()
	{
		//$this->load->model("subscription");
		$urlssarray = array();
		$urlssarray = $this->subscription->getUserSubs();
		$mysubs = array();
		foreach ($urlssarray as $url) 
		{
			$mysubs[] = array("sub_details" => $this->createSingleSub($url));
		}
		$this->data["subscriptions"] = array("sub_details" => $mysubs);
	}
	
	function createSingleSub($suburl) {
		//$this->load->model("subscription");
		$posts = $this->subscription->getSubPosts($suburl);
		$myposts = array();
		foreach ($posts as $post) 
		{
			$myposts[] = array("sub_url" => $suburl, "post_link" => "test2");
		}
		$parms = array("posts" => $myposts, "feedurl"=>$suburl, "sub_url"=>$suburl);
		return $this->parser->parse("_subscription", $parms, false);
	}
}