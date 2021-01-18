<?php

class ClassModel extends CI_Model {

    function getAllClasses() {
        $stored_proc_call = "CALL showClasses()";
        $query = $this->db->query($stored_proc_call);

        mysqli_next_result($this->db->conn_id);
        return $query;
    }

    function getClass($date) {
        $stored_proc_call = "CALL selectClass(?)";
        $query = $this->db->query($stored_proc_call,$date);

        mysqli_next_result($this->db->conn_id);
        return $query;
    }

}
