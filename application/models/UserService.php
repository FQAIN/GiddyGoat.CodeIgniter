<?php

class UserService extends CI_Model {

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

    function addUser($user_data) {
        //Calls the Register_Member stored procedure to add all the fields to the table
        $commandText = "CALL Register_Member(?,?,?,?,?,?,?,?,?,?,?,?)";
        $this->db->query($commandText, $user_data);
    }

}
