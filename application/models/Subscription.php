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
		$this->subs["url1"] = "http://www.reddit.com";
		$this->subs["url2"] = "http://www.google.ca";
		$this->subs["url3"] = "http://www.cnn.com";
		$this->subs["url4"] = "http://www.cbc.ca";
		$this->subs["url5"] = "http://www.reddit.com";
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

