<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Controller extends CI_Controller {
	
	protected $data = array();

	function __construct() {
        parent::__construct();
		$this->data = array();
		$this->buttons = array();
    }
	
	function render() 
	{
		/* Set up  menu */
		/*$buttons[] = $this->parser->parse("_button", (array) $button, true);*/
		$this->data["menu"] = $this->parser->parse($this->data["menu"], $this->data, true);
		
		/* Set up page */
		$this->data["content"] = $this->parser->parse($this->data["content"], $this->data, true);
		$this->parser->parse("_template_main", $this->data);
	}
    
    function render_login()
    {
        $this->data["content"] = $this->parser->parse($this->data["login"], $this->data, true);
		$this->parser->parse("_template_login", $this->data);
    }
}