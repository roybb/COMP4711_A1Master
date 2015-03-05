<?php

class Subscription extends CI_Model {

	protected $subs = array();
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	function getUserSubs() 
	{
		/*
		$subscription = $this->load->model('subscription');
		// TODO: First retrieve subscriptions from the db. 
		$usersubs = $this->subscription->some('subs', $userid);
		if (count($usersubs) < 1) $usersubs = null;

		//TODO: populate array with stored urls from the subs table db table. 
		$this->subs = array();
		if ($usersubs != null) 
		{
			foreach ($usersubs as $sub) 
			{
				array_push($subs, $sub);
			}
		}
		else
		{
			$this->subs = null;
		}
		*/
		//TEMP: fake data. 
		$this->subs = array();
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

		//Parse data out of JSON and add urls to $sub array. 
		//Need to get the [url] and [title] fields primarily. 
		$sub["posts"] = array();
		$i = 0;
		foreach ($json->data->children as $post)
		{
			//Useful: url, title, permalink, thumbnail?
			
			// Temp: uncomment this block to see the json output. 
			/*
			echo "<pre>";
			print_r($post->data);
			echo "</pre>";
			*/
			
			$sub["posts"][$i] = $post->data->url;
			++$i;		
		}
		//REMINDER: Getting dupe data because I have 2 fake subs. See getUserSubs(). 
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

