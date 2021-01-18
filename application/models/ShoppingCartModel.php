<?php

class ShoppingCartModel extends CI_Model {

    function AddToCart($data) {
        $stored_proc_call = "CALL AddToCart(?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($stored_proc_call, $data);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getCartItems($data) {
        $stored_proc_call = "CALL SelectCartPerPageNS(?)";
        $query = $this->db->query($stored_proc_call, $data);

        mysqli_next_result($this->db->conn_id);
        return $query;
    }
    
   
    function deleteCartItem($delete) {
        $stored_proc_call = "CALL deleteItem(?,?)";
        $this->db->query($stored_proc_call, $delete);
    }

}
