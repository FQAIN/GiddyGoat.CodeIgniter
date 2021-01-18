<?php

class User extends CI_Model {

    //This function checks if a user is valid or not from the stored procedure
    function validUser() {
        //Takes the inputted email and puts it into the associative array 
        $user_details['emailAddress'] = $this->input->post('email');
        //Takes the inputted password and puts it into the associative array 
        $user_details['password'] = $this->input->post('password');

        //Calls the Valid_Member stored procedure 
        $selectContact = "CALL Valid_Member(?,?)";
        $query = $this->db->query($selectContact, $user_details);

        //If a member exits will return true
        if ($query->num_rows() > 0) {
            return true;
        }
        //Otherwise will return false
        else {
            return false;
        }
    }

    function addUser() {
        //Takes the inputted first name and puts it into the associative array 
        $user_data['fName'] = $this->input->post('fName');
        //Takes the inputted last name and puts it into the associative array 
        $user_data['lName'] = $this->input->post('lName');
        //Takes the inputted password and puts it into the associative array 
        $user_data['password'] = $this->input->post('password');
        //Takes the inputted phone and puts it into the associative array 
        $user_data['phone'] = $this->input->post('phone');
        //Takes the inputted emailAddress and puts it into the associative array 
        $user_data['emailAddress'] = $this->input->post('emailAddress');
        //Takes the inputted addressLine1 and puts it into the associative array 
        $user_data['addressLine1'] = $this->input->post('addressLine1');
        //Takes the inputted addressLine2 and puts it into the associative array 
        $user_data['addressLine2'] = $this->input->post('addressLine2');
        //Takes the inputted addressLine3 and puts it into the associative array 
        $user_data['addressLine3'] = $this->input->post('addressLine3');
        //Takes the inputted city and puts it into the associative array 
        $user_data['city'] = $this->input->post('city');
        //Takes the inputted county and puts it into the associative array 
        $user_data['county'] = $this->input->post('county');
        //Takes the inputted country and puts it into the associative array 
        $user_data['country'] = $this->input->post('country');
        //Takes the inputted subscribe and puts it into the associative array 
        $user_data['subscribe'] = $this->input->post('subscribe');


        //Calls the Register_Member stored procedure to add all the fields to the table
        $addEntry = "CALL Register_Member(?,?,?,?,?,?,?,?,?,?,?,?)";
        $this->db->query($addEntry, $user_data);
    }

}
