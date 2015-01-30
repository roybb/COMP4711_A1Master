<?php

class Subscription extends CI_Model {

	protected $subs = array();
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	function getUserSubs() 
	{
		// Create temp dummy data for now
		
		$this->subs = array();
		
		$this->subs["0"] = array("sub" => "This is a subreddit url");
		$this->subs["1"] = array("sub" => "This is another subreddit url");		
		// End fake data. 
		
		return $this->subs;
	}
	
	function getSubPosts($sub)
	{
		$sub["posts"] = array();
		// Start populating dummy data
		for ($i = 0; $i < 5; $i++)
		{
			$sub["posts"][$i] = "This is hard-coded fake post number " . $i;
		}
		// End dummy data
		
		return $sub["posts"];
	}
	
	function addSub($url)
	{
		//Temp - to add in part 2. 
	}

}

