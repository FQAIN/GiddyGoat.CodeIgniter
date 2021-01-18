<?php

class GG extends CI_Controller {

    //Parent Constructer
    function __construct() {
        parent::__construct();
    }

    //function that Loads the default view for the home/index page
    function index() {
        $view_data = array(
            'content' => $this->load->view('content/home', null, TRUE),
        );

        //Adds the partial view from the layout view
        $this->load->view('layout', $view_data);
    }

    //function that Loads the classes view for the classes page
    function classes() {
        $view_data = array(
            'content' => $this->load->view('content/classes', null, TRUE),
        );

        //Adds the partial view from the layout view
        $this->load->view('layout', $view_data);
    }

    //function that Loads the gallery view for the gallery page
    function gallery() {
        $view_data = array(
            'content' => $this->load->view('content/gallery', null, TRUE),
        );

        //Adds the partial view from the layout view
        $this->load->view('layout', $view_data);
    }

    //function that Loads the contact view for the contact page
    function contact() {
        $view_data = array(
            'content' => $this->load->view('content/contact', null, TRUE),
        );

        //Adds the partial view from the layout view
        $this->load->view('layout', $view_data);
    }

    //This function is to validate all the fields in the form to check if it is empty (form validation function)
    function AddEntry() {
        $user_validation_rules = array(
            array('field' => 'fName',
                'label' => 'Firstname',
                'rules' => 'required',
                'errors' => array('required' => 'You must provide a %s.')),
            array('field' => 'lName',
                'label' => 'Surname',
                'rules' => 'required',
                'errors' => array('required' => 'You must provide a %s.')),
            array('field' => 'emailAddress',
                'label' => 'Email',
                'rules' => 'required',
                'errors' => array('required' => 'You must provide an %s.')),
            array('field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => array('required' => 'You must provide a %s.')),
            array('field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required',
                'errors' => array('required' => 'You must provide a %s.')),
            array('field' => 'addressLine1',
                'label' => 'AddressLine1',
                'rules' => 'required',
                'errors' => array('required' => 'You must provide an %s.')),
            array('field' => 'addressLine2',
                'label' => 'AddressLine2',
                'rules' => 'required',
                'errors' => array('required' => 'You must provide an %s.')),
            array('field' => 'addressLine3',
                'label' => 'AddressLine3',
                'rules' => 'required',
                'errors' => array('required' => 'You must provide an %s.')),
            array('field' => 'city',
                'label' => 'City',
                'rules' => 'required',
                'errors' => array('required' => 'You must provide a %s.')),
            array('field' => 'county',
                'label' => 'County',
                'rules' => 'required',
                'errors' => array('required' => 'You must provide a %s.')),
            array('field' => 'country',
                'label' => 'Country',
                'rules' => 'required',
                'errors' => array('required' => 'You must provide a %s.')),
            array('field' => 'subscribe',
                'label' => 'Y/N',
                'rules' => 'required',
                'errors' => array('required' => 'You must provide a %s.'))
        );

        //Sets the form validation rules
        $this->form_validation->set_rules($user_validation_rules);

        //If the user did not enter the form acording to the form validation 
        if ($this->form_validation->run() == FALSE) {
             //it will Load the AddEntry view again 
            $view_data = array(
                'content' => $this->load->view('content/AddEntry', null, TRUE),
            );

            $this->load->view('layoutForRegister', $view_data);
        } 
        //Otherwise (if the validation rules have been met succesfully)
        else {
             //Loads the Model of User from the models folder  
            $this->load->model('User');
            //And gets the functions addUser from the User Model
            $this->User->addUser();
            $this->index();
        }
    }

    //This is the logout function for when a user clicks logout is destroys that specific session
    function logout() {
        unset($_SESSION['loggedIn']);
        $this->session->sess_destroy();
        //Redirects the user back to the index fuction which leads you back to the home page
        redirect('GG/index');
    }
}
?>