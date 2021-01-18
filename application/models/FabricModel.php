<?php

class FabricModel extends CI_Model {

    function getFabrics() {
        //Calls the stored procedure getFabrics which gets all the details of all fabrics
        $stored_proc_call = "CALL getFabrics()";
        $query = $this->db->query($stored_proc_call);

        //Prepares next result set from a previous call to mysqli_multi_query() 
        mysqli_next_result($this->db->conn_id);
        //Returns the stored procedure query
        return $query;
    }

    function getFabricTypes() {
        //Calls the stored procedure getFabricTypes which gets all the details of all fabrics types
        $stored_proc_call = "CALL getFabricTypes()";
        $query = $this->db->query($stored_proc_call);

        //Prepares next result set from a previous call to mysqli_multi_query() 
        mysqli_next_result($this->db->conn_id);
        //Returns the stored procedure query
        return $query;
    }

    function getSelectedFabricTypes($fabricTypeID) {
        //Calls the stored procedure getSelectedFabricTypes which gets all the details of that selected fabric type
        $stored_proc_call = "CALL getSelectedFabricTypes(?)";
        $query = $this->db->query($stored_proc_call, $fabricTypeID);

        //Prepares next result set from a previous call to mysqli_multi_query() 
        mysqli_next_result($this->db->conn_id);
        //Returns the stored procedure query
        return $query;
    }

    function fabric_count() {
        //Returns and counts all the fabrics from the fabrics table
        return $this->db->count_all("fabric");
    }

    function getFabricsPerPage($limit, $start) {
        //Set the Start and Limit – only retrieves rows between these limits
        $fabricData['limit'] = $limit;
        $fabricData['start'] = $start;

        //Calls the stored procedure to get the number of fabrics per page
        $stored_proc_call = "CALL getFabricsPerPage(?,?)";
        $query = $this->db->query($stored_proc_call, $fabricData);

        //Prepares next result set from a previous call to mysqli_multi_query() 
        mysqli_next_result($this->db->conn_id);
        //Returns the stored procedure query
        return $query;
    }

    function getSpecificFabric($fabricID) {
        //Calls the stored procedure getSpecificFabric which gets all the details of a specific fabric
        $stored_proc_call = "CALL getSpecificFabric(?)";
        $query = $this->db->query($stored_proc_call, $fabricID);
        $rows = $query->row();

        //Prepares next result set from a previous call to mysqli_multi_query() 
        mysqli_next_result($this->db->conn_id);
        //Returns the stored procedure query as a row
        return $rows;
    }

}
