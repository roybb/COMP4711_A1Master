<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Main_Controller {

	function __construct() {
            parent::__construct();
        }
	
	public function index()
	{	
		/* Set the page title, heading, and content here */
		$this->data["pagetitle"] = "RedScribeIt User Registration";
		$this->data["heading"] = "RedScribeIt Registration";
		$this->data["menu"] = "menu";
                $this->data['register'] = 'register';
		$this->data["content"] = $this->parser->parse($this->data["register"], $this->data, true);
                
                /* calls render_register() in the Main_Controller 
                   , see MY_Controller.php in ./core */
                $this->render_register();
	}
        
        function do_upload()
	{
		$config['upload_path'] = './assets/images';
		$config['allowed_types'] = 'gif|jpg|xpng';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->upload->initialize($config);
                $this->upload->do_upload();
                
                redirect('/login', 'refresh');
	}
}