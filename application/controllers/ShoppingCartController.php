<?php

class ShoppingCartController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('FabricModel');
        $this->load->model('NotionModel');
        $this->load->model('ShoppingCartModel');
    }

    function addFabricToCart($fabricID) {
        $fabric = $this->FabricModel->getSpecificFabric($fabricID);

        $data['session_id'] = $_SESSION;
        $data['class_id'] = null;
        $data['fabric_id'] = $fabricID;
        $data['notion_id'] = null;
        $data['product_name'] = $fabric->name;
        $data['product_desc'] = $fabric->description;
        $data['quantity'] = $this->input->post('quantity');
        $data['price'] = $fabric->cost;
        $data['date_added'] = date('Y-m-d H:i:s');
        $data['image_path'] = $fabric->image;

        if (!$this->ShoppingCartModel->AddToCart($data)) {
            echo 'Error';
        } else {
            $data = array();
            $session_id = $_SESSION;
            $data['items'] = $this->ShoppingCartModel->getCartItems($session_id);
            //Loads the fabrics view for the fabrics page
            $view_data = array(
                'content' => $this->load->view('content/view_cart', $data, TRUE)
            );
            //Adds the partial view from the layout view
            $this->load->view('layout2', $view_data);
        }
    }

    function addNotionToCart($notionID) {
        $notion = $this->NotionModel->getSpecificNotion($notionID);

        $data['session_id'] = $_SESSION;
        $data['class_id'] = null;
        $data['fabric_id'] = null;
        $data['notion_id'] = $notionID;
        $data['product_name'] = $notion->name;
        $data['product_desc'] = $notion->description;
        $data['quantity'] = $this->input->post('quantity');
        $data['price'] = $notion->cost;
        $data['date_added'] = date('Y-m-d H:i:s');
        $data['image_path'] = $notion->image;

        if (!$this->ShoppingCartModel->AddToCart($data)) {
            echo 'Error';
        } else {
            $data = array();
            $session_id = $_SESSION;
            $data['items'] = $this->ShoppingCartModel->getCartItems($session_id);
            //Loads the fabrics view for the fabrics page
            $view_data = array(
                'content' => $this->load->view('content/view_cart', $data, TRUE)
            );
            //Adds the partial view from the layout view
            $this->load->view('layout2', $view_data);
        }
    }
    
       public function deleteItem() {
        if($this->input->post('class_id'))
        {
            $delete['class_id'] = $this->input->post('class_id');
        }
        else if($this->input->post('fabric_id'))
        {
            $delete['fabric_id'] = $this->input->post('fabric_id');
        }
        else if($this->input->post('notion_id'))
        {
            $delete['notion_id'] = $this->input->post('notion_id');
        }
        
        $delete['id'] = $this->input->post('id');

        $this->ShoppingCartModel->deleteCartItem($delete);
        
        $data['items'] = $this->ShoppingCartModel->getCartItems($delete['id']);
        
        $view_data = array(
                'content' => $this->load->view('content/view_cart', $data, TRUE)
            );
        
        //Adds the partial view from the studentLayout view
        $this->load->view('layout2', $view_data);
    }

}
