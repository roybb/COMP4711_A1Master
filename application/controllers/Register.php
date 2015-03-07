<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Main_Controller {
        protected $error;
	
        function __construct() {
            parent::__construct();
            $this->error = NULL;
        }
	
	public function index()
	{	
                if ( $this->error ) {
                    $this->data['message'] = $this->error;
                } else {
		/* Set the page title, heading, and content here */
                    $this->data['message'] = '';
                }
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
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite'] = TRUE;
		$config['max_size']	= '100';
		$config['max_width']  = '128';
		$config['max_height']  = '128';
                
                /* set upload restrictions for upload configuration */
		$this->upload->initialize($config);
                
                /* user uploads no file or an invalid file */
                if ( !$this->upload->do_upload() )
		{
                    /* user assigned a default image if no uploaded file selected but provides username and password */
                    if ( $this->input->post('username') != '' && $this->input->post('password') != '' && $this->upload->data()["file_size"] == NULL )  {
                        $userdata = array(
                        'uname' => $this->input->post('username'),
                        'pword' => $this->input->post('password'),
                        'avatar' => 'null.jpg',
                        'role' => "user"
                         );
                        /* check for duplicate entries & register accordingly */
                        $this->isDuplicate();
                    } else {
                        /* user uploads an invalid file */
                        $this->error = $this->upload->display_errors();
                        $this->index();
                    }
		}
		else
		{
                    /* grab image path from file upload */
                    $imagedata = $this->upload->data();
                    $imagepath = $imagedata["file_name"];
                    
                    $userdata = array(
                        'uname' => $this->input->post('username'),
                        'pword' => $this->input->post('password'),
                        'avatar' => $imagepath,
                        'role' => "user"
                    );
                    /* check for duplicate entries & register accordingly */
                    $this->isDuplicate();
		}
	}
        
        function isDuplicate() {
            /* first check for duplicate user */
            if ($this->users->checkDuplicate($userdata['uname'])) {
                /* successful register, username not taken */
                $this->users->adduser($userdata);
                redirect('/login', 'refresh');
            } else {
                /* username is taken */
                $this->error = "Username already exists.";
                $this->index();
            }
        }
}