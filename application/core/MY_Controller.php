<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Controller extends CI_Controller {
	
	protected $data = array();

	function __construct() {
        parent::__construct();
		$this->data = array();
		/*$this->buttons = array();*/
    }
	
	function render() 
	{
		/* Set up  menu */
		$this->data["menu"] = $this->parser->parse($this->data["menu"], $this->data, true);
		
		/* Set up page */
		$this->data["content"] = $this->parser->parse($this->data["content"], $this->data, true);
		$this->parser->parse("_template_main", $this->data);
	}
    
    function render_login()
    {
        
		$this->parser->parse("_template_login", $this->data);
    }
    
    function render_register()
    {
                /* will use same template as login page */
		$this->parser->parse("_template_register", $this->data);
    }
}