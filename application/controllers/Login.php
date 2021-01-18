<?php

class Login extends CI_Controller
{

    //Parent Constructer
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //Loads the user model
        $this->load->model('UserService');

        //If the user presses the login button the post method is invoked
        if ($this->input->post('login')) {
            //The user is checked on wheather it is a valid user by getting the ValidUser method
            //in the User Model and if it is valid
            $username = $this->input->post('email');
            //Takes the inputted password and puts it into the associative array 
            $password = $this->input->post('password');
            $user = $this->UserService->GetUserByCredentials($username, $password);
            if ($user != null) {
                //It Sets the session userdata to true
                $this->session->set_userdata('loggedIn', true);
                $this->session->set_userdata('memberId', $user->member_Id);
            }
        }
        //And redirects the user to the index function in the GG Controller which loads the home page
        redirect('GG/index');
    }
}
