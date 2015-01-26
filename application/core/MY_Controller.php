<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Controller extends CI_Controller {
	
	protected $data = array();

	function __construct() {
        parent::__construct();
		$this->data = array();
    }
	
	function render() 
	{
		$this->data["menu"] = "MENU NOT SET";
		$this->data["content"] = $this->parser->parse($this->data["content"], $this->data, true);
		$this->parser->parse("_template_main", $this->data);
	}
}