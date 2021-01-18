<?php

class ShoppingCartController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('FabricModel');
        $this->load->model('NotionModel');
        $this->load->model('ShoppingCartModel');
    }

    function addFabricToCart($fabricID)
    {
        $fabric = $this->FabricModel->getSpecificFabric($fabricID);

        $data['session_id'] = session_id();
        $data['class_id'] = null;
        $data['fabric_id'] = $fabricID;
        $data['notion_id'] = null;
        $data['product_name'] = $fabric->name;
        $data['product_desc'] = $fabric->description;
        $data['quantity'] = $this->input->post('quantity');
        $data['price'] = $fabric->cost;
        $data['date_added'] = date('Y-m-d H:i:s');
        $data['image_path'] = $fabric->image;


        $data = array();
        $session_id = session_id();
        $data['items'] = $this->ShoppingCartModel->getCartItems($session_id);
        //Loads the fabrics view for the fabrics page
        $view_data = array(
            'content' => $this->load->view('content/view_cart', $data, TRUE)
        );
        //Adds the partial view from the layout view
        $this->load->view('layout2', $view_data);
    }

    function addNotionToCart($notionID)
    {
        $notion = $this->NotionModel->getSpecificNotion($notionID);

        $data['session_id'] = session_id();
        $data['class_id'] = null;
        $data['fabric_id'] = null;
        $data['notion_id'] = $notionID;
        $data['product_name'] = $notion->name;
        $data['product_desc'] = $notion->description;
        $data['quantity'] = $this->input->post('quantity');
        $data['price'] = $notion->cost;
        $data['date_added'] = date('Y-m-d H:i:s');
        $data['image_path'] = $notion->image;
        $data = array();
        $session_id = session_id();
        $data['items'] = $this->ShoppingCartModel->getCartItems($session_id);
        //Loads the fabrics view for the fabrics page
        $view_data = array(
            'content' => $this->load->view('content/view_cart', $data, TRUE)
        );
        //Adds the partial view from the layout view
        $this->load->view('layout2', $view_data);
    }

    public function checkout()
    {
        $cartItems = $this->ShoppingCartModel->getCartItems($_SESSION);

        $memberId = $_SESSION["memberId"];

        $purchaseId = $this->ShoppingCartModel->AddPurchase($memberId);

        foreach ($cartItems->result_array() as $cartItem) {
            $this->ShoppingCartModel->AddPurchaseDetail($purchaseId, $cartItem);
        }
    }
    public function deleteItem()
    {


        $delete['id'] = $this->input->post('id');

        $this->ShoppingCartModel->deleteCartItem($delete);

        $data['items'] = $this->ShoppingCartModel->getCartItems();

        $view_data = array(
            'content' => $this->load->view('content/view_cart', $data, TRUE)
        );

        //Adds the partial view from the studentLayout view
        $this->load->view('layout2', $view_data);
    }
}
//    WHERE class_id = p_input OR fabric_id = p_input OR notion_id = p_input OR image_path = p_input;