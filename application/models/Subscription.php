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
		
		$this->subs["0"] = array("sub" => "This is a subreddit url", "posts" => "Eddy wuz here");
		$this->subs["1"] = array("sub" => "This is another subreddit url", "posts" => "This is a post under the sub");		
		// End fake data. 
		
		return $this->subs;
	}
	
	function getSubPosts($sub)
	{
		$sub->$items = array();
		// Start populating dummy data
		for ($i = 0; $i < 5; $i++)
		{
			$sub->array_push($items, "" . $i . ") This is a hard-coded fake post");
		}
		// End dummy data
		
		return $sub->$items;
	}
	
	function addSub($url)
	{
		//Temp - to add in part 2. 
	}

}

