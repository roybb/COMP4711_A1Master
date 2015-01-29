<?php

class Subscription extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	$subs = array();
	
	function getUserSubs() 
	{
		// Create temp dummy data for now
		$this->$subs = array();
		array_push($subs, "http://www.reddit.com");
		array_push($subs, "http://www.google.ca");
		array_push($subs, "http://www.cnn.com");
		array_push($subs, "http://www.cbc.ca");
		array_push($subs, "http://www.bcit.ca");
		// End fake data. 
		
		return $subs;
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

