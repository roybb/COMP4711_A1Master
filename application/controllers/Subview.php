<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subview extends Main_Controller {

	function __construct() {
        parent::__construct();
    }
	
	private function render()
	{
		$this->data["sub"] = "www.google.ca";
		$this->data["posts"] = "this is a post";
	}
}