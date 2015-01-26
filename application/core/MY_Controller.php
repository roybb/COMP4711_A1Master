<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Controller extends CI_Controller {
	
	protected $data = array();

	function __construct() {
        parent::__construct();
		$this->data = array();
		$this->data["pagetitle"] = "PAGE TITLE NOT SET";
    }
	
	function render() 
	{
		$this->data["content"] = $this->parser->parse($this->data["pagebody"]);
		$this->parser->parse('_template_main', $this->data);
	}
	
}