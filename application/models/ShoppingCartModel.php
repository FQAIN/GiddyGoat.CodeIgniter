<?php

class ShoppingCartModel extends CI_Model
{

    function AddToCart($data)
    {
        $commandText = "CALL AddToCart(?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($commandText, $data);

        return $this->db->insert_id();
    }

    function AddPurchaseDetail($purchaseId, $cartItem)
    {
        $commandParameters = array(
            $purchaseId,
            $cartItem['class_id'],
            $cartItem['fabric_id'],
            $cartItem['notion_id'],
            $cartItem['qty'],
            $cartItem['price']
        );
        $commandText = "CALL AddPurchaseDetail(?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($commandText, $commandParameters);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getCartItems()
    {
        $commandText = "CALL SelectCartPerPageNS()";
        $query = $this->db->query($commandText);

        mysqli_next_result($this->db->conn_id);
        return $query;
    }


    function deleteCartItem($delete)
    {
        $commandText = "CALL removeFromCart(?)";
        $this->db->query($commandText, $delete);
    }
}
