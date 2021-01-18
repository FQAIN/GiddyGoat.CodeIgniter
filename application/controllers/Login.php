<?php

class Login extends CI_Controller {

    //Parent Constructer
    function __construct() {
        parent::__construct();
    }

    public function index() {
        //Loads the user model
        $this->load->model('User');

        //If the user presses the login button the post method is invoked
        if ($this->input->post('login')) {
            //The user is checked on wheather it is a valid user by getting the ValidUser method
            //in the User Model and if it is valid
            if ($this->User->validUser() == true) {
                //It Sets the session userdata to true
                $this->session->set_userdata('loggedIn', true);
            }
        }
        //And redirects the user to the index function in the GG Controller which loads the home page
        redirect('GG/index');
    }

}
