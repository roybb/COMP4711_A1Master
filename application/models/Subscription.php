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
		// Need to pull subreddits using api here.
		$resp = $this->getTop5("http://www.reddit.com/r/destiny");
		$json = json_decode($resp);
		
		echo "<pre>";
		(print_r($json));
		echo "</pre>";
		
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
	
	function getTop5($url) 
	{
		$endpoint = $url . "/new.json?limit=5";
		$result = file_get_contents($endpoint);
		return $result;
	}

}

