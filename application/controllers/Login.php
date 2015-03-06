<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Login extends Main_Controller {

    function __construct() {
        parent::__construct();
        $this->errors = array();
    }

    function index() {     
        //puts everything into /views/_template_login.php
        $this->data['login'] = 'login';
        $this->data["href"]= "/register";
        $this->data["pagetitle"] = "RedScribeIt Login";
        $this->data["heading"] = "RedScribeIt Login";
        
        //this stuff builds the form to let users log in
        $message = '';
        if (count($this->errors) > 0)
        {
            foreach($this->errors as $booboo)
                $message .= $booboo ;
        }
        $this->data['message'] = $message;
        
        //data["login"] is a php view
        $this->data["content"] = $this->parser->parse($this->data["login"], $this->data, true);
        
        //render_login is found in the core controller; specific to the login page
        $this->render_login();
    }
    
    function confirmlogin() {
        //pull information from form
        $userid = $this->input->post('username');
        $userpwd = $this->input->post('password');
        
        //validate user input
        if(empty($userid))
            $this->errors[] = 'No user name was specified.';
        else if(empty($userpwd))
            $this->errors[] = 'no password was entered.';
        //else
        //    $this->errors[] = 'incorrect user name and password combination';
        
        //redirect based on successful login or failure
        if (count($this->errors) > 0) 
            $this->index();
        else
            redirect('/');
    }
    

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */