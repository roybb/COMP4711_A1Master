<?php

class Subscription extends CI_Model {

	protected $subs = array();
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	function getUserSubs() 
	{
		// TODO: First retrieve subscriptions from the db. 
		
		
		//TODO: populate array with stored urls from the subs table db table. 
		$this->subs = array();
		
		//TEMP: fake data. 
		$this->subs["0"] = array("sub" => "This is a subreddit url");
		$this->subs["1"] = array("sub" => "This is another subreddit url");		
		// End fake data. 
		
		return $this->subs;
	}
	
	function getSubPosts($sub)
	{
		//Pull newest5 subreddit posts using reddit api here.
		$resp = $this->getTop5("http://www.reddit.com/r/destiny");
		//TODO: validate in case bad http response and handle. 
		
		// if validated, deserialize JSON. 
		$json = json_decode($resp);

		//Test
		foreach ($json->data->children as $post)
		{
			echo "<pre>";
			print_r("Url: " . $post->data->url);
			print_r("\nTitle: " . $post->data->title);
			echo "</pre>";
		}
		
		
		//TODO: parse data out of JSON and add urls to $sub array. 
		//Need to get the [url] and [title] fields primarily. 
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
		//Calls the reddit "new" API to return the newest 5 posts in a sub.
		//QUESTION: is there a way to make this a async call? 
		$endpoint = $url . "/new.json?limit=5";
		$result = file_get_contents($endpoint);
		return $result;
	}

}

