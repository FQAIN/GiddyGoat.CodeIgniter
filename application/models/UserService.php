<?php

class UserService extends CI_Model
{

    //This function checks if a user is valid or not from the stored procedure
    function validUser()
    {
        //Takes the inputted email and puts it into the associative array 
        $user_details['emailAddress'] = $this->input->post('email');
        //Takes the inputted password and puts it into the associative array 
        $user_details['password'] = $this->input->post('password');

        //Calls the Valid_Member stored procedure 
        $commandText = "CALL Valid_Member(?,?)";
        $query = $this->db->query($commandText, $user_details);

        //If a member exits will return true
        if ($query->num_rows() > 0) {
            return true;
        }
        //Otherwise will return false
        else {
            return false;
        }
    }


    function GetUserByCredentials($username, $password)
    {
        $commandText = "CALL Valid_Member(?,?)";
        $parameters = array($username, $password);
        $query = $this->db->query($commandText, $parameters);

        mysqli_next_result($this->db->conn_id);
        return $query->num_rows() > 0 ? $query->result()[0] : null;
    }

    function addUser($user_data)
    {
        //Calls the Register_Member stored procedure to add all the fields to the table
        $commandText = "CALL Register_Member(?,?,?,?,?,?,?,?,?,?,?,?)";
        $this->db->query($commandText, $user_data);
    }
}
