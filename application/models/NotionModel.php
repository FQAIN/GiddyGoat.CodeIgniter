<?php

class NotionModel extends CI_Model {

    function getNotions() {
        //Calls the stored procedure getNotions which gets all the details of all notions
        $stored_proc_call = "CALL getNotions()";
        $query = $this->db->query($stored_proc_call);

        //Prepares next result set from a previous call to mysqli_multi_query() 
        mysqli_next_result($this->db->conn_id);
        //Returns the stored procedure query
        return $query;
    }

    function getNotionTypes() {
        //Calls the stored procedure getNotionTypes which gets all the details of all notions types
        $stored_proc_call = "CALL getNotionTypes()";
        $query = $this->db->query($stored_proc_call);

        //Prepares next result set from a previous call to mysqli_multi_query() 
        mysqli_next_result($this->db->conn_id);
        //Returns the stored procedure query
        return $query;
    }

    function getSelectedNotionTypes($notionTypeID) {
        //Calls the stored procedure getSelectedNotionTypes which gets all the details of that selected notion type
        $stored_proc_call = "CALL getSelectedNotionTypes(?)";
        $query = $this->db->query($stored_proc_call, $notionTypeID);

        //Prepares next result set from a previous call to mysqli_multi_query() 
        mysqli_next_result($this->db->conn_id);
        //Returns the stored procedure query
        return $query;
    }

    function notion_count() {
        //Returns and counts all the notions from the notions table
        return $this->db->count_all("notions");
    }

    function getNotionsPerPage($limit, $start) {
        //Set the Start and Limit – only retrieves rows between these limits
        $notionData['limit'] = $limit;
        $notionData['start'] = $start;

        //Calls the stored procedure to get the number of notions per page
        $stored_proc_call = "CALL getNotionsPerPage(?,?)";
        $query = $this->db->query($stored_proc_call, $notionData);

        //Prepares next result set from a previous call to mysqli_multi_query() 
        mysqli_next_result($this->db->conn_id);
        //Returns the stored procedure query
        return $query;
    }

    function getSpecificNotion($notionID) {
        //Calls the stored procedure getSpecificNotion which gets all the details of a specific notion
        $stored_proc_call = "CALL getSpecificNotion(?)";
        $query = $this->db->query($stored_proc_call, $notionID);
        $rows = $query->row();

        //Prepares next result set from a previous call to mysqli_multi_query() 
        mysqli_next_result($this->db->conn_id);
        //Returns the stored procedure query as a row
        return $rows;
    }

}
