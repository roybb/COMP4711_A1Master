<?php

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
        
        //displays error messages if there were any
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
        session_start();
        $this->load->model("loginmodel");
        
        //pull information from form
        $userid = $this->input->post('username');
        $userpwd = $this->input->post('password');
        
        //validate user input
        if(empty($userid))
            $this->errors[] = 'No user name was specified.';
        else if(empty($userpwd))
            $this->errors[] = 'No password was entered.';
        else {
            $ret = $this->loginmodel->validateLogin($userid, $userpwd);
            if ($ret == FALSE)
            {
                $this->errors[] = 'Incorrect username and password combination';
            }
            else if ($ret == TRUE)
            {
                //if validation success then grab the user information and store into session
                $user = $this->loginmodel->getUser($userid);
                $_SESSION['user'] = $user['name'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['id'] = $user['id'];
            }
            else 
            {
                $this->errors[] = 'Unhandled error case';
            }
        }
        
        //redirect based on successful login or failure
        if (count($this->errors) > 0) 
            $this->index();
        else
            redirect('/');
    }
    

}
