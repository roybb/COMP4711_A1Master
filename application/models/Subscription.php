<?php

class Subscription extends MY_Model2 {

	protected $subs = array();
	
	public function __construct()
	{
		parent::__construct('subs', 'userid');
	}
	
	
	function getUserSubs($uid) 
	{
		$subscription = $this->load->model('subscription');
		// Retrieve subscriptions from the db. 
		$usersubs = $this->subscription->some('userid', $uid);

		// Populate array with stored urls from the subs table db table. 
		$this->subs = array();
		if ($usersubs != null) 
		{
			foreach ($usersubs as $sub)
			{
				$s = array("sub" => $sub->url);
				array_push($this->subs, $s);
			}
		}
		else
		{
			$this->subs = null;
		}
		
		return $this->subs;
	}
	
	function getSubPosts($sub)
	{
		//Pull newest5 subreddit posts using reddit api here.
		$resp = $this->getTop5($sub["sub"]);
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
			$sub["posts"][$i]["permalink"] = $post->data->permalink;
			$sub["posts"][$i]["title"] = $post->data->title;
			++$i;		
		}
		
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
        
        /*Returns false if user already has 5 subreddit subscriptions*/
        function validateSubscription($userid)
        {
            $ret = array();
            $user = $this->some('userid', $userid);
            
            if(count($user) < 5)
            $ret = TRUE;
            
            else
            $ret = FALSE;
            
            return $ret;
        }

}
