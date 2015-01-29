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
    }

    function index() {
        $this->data['login'] = 'login';
        $this->data["href"]= "/userregister";
        $this->data["pagetitle"] = "RedScribeIt Login";
        $this->data["heading"] = "RedScribeIt Login";
        
        $this->render_login();
    }
    

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */