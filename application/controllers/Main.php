<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Main_Controller {

	function __construct() {
        parent::__construct();
		$this->data["pagetitle"] = "RedScribeIt Homepage";
    }
	
	public function index()
	{
		$this->load->view('_template_main');
		
		$this->data['pagetitle'] = "THIS IS THE PAGE TITLE";
		$this->data['pagebody'] = 'main';
	}
	
	function render() 
	{
		$this->parser->parse('main', $this->data);
	}
	
}