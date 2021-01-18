<?php

class FabricController extends CI_Controller {

    //Parent Constructer
    function __construct() {
        parent::__construct();
        //Load required models etc. in constructor
        $this->load->model('FabricModel');
        //Load required libraries etc. in constructor
        $this->load->library('pagination');
    }

    function fabricsSelect() {
        $fabricOption = $this->input->post('fabricOption');
        if ($fabricOption === "all") {
            $this->fabrics();
        } else {
            //Calls the getFabricsPerPage from the FabricModel and passes in the $fabricOption
            $fabricData['fabrics'] = $this->FabricModel->getSelectedFabricTypes($fabricOption);
            //Calls the getFabricTypes function from the FabricModel
            $fabricData['fabricTypes'] = $this->FabricModel->getFabricTypes();
            $fabricData['count'] = 1;
            //Sets the $fabricData variable into the associative array
            $fabricData['selectedFabricType'] = $fabricOption;

            //Loads the fabrics view for the fabrics page
            $view_data = array(
                'content' => $this->load->view('content/fabrics', $fabricData, TRUE)
            );
            //Adds the partial view from the layout view
            $this->load->view('layout', $view_data);
        }
    }

    function fabrics() {
        // Count all record of table "fabric" in database.
        $totalRec = $this->FabricModel->fabric_count();
        //Sets the per page pagination as 6 per page
        $perPage = 6;

        //Pagination Configuration
        $config['base_url'] = site_url('FabricController/fabrics');
        $config['url_segment'] = 3;
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $perPage;

        //Initialise the Pagination ibrary
        $this->pagination->initialize($config);

        //Define Offset
        $page = $this->uri->segment(3);
        $offset = !$page ? 0 : $page;

        //Calls the getFabricsPerPage from the FabricModel and passes in the perpage and offset
        $data['fabrics'] = $this->FabricModel->getFabricsPerPage($perPage, $offset);
        //Calls the getFabricTypes function from the FabricModel
        $data['fabricTypes'] = $this->FabricModel->getFabricTypes();
        $data['count'] = 1;

        //Loads the fabrics view for the fabrics page
        $view_data = array(
            'content' => $this->load->view('content/fabrics', $data, TRUE)
        );
        //Adds the partial view from the layout view
        $this->load->view('layout', $view_data);
    }

    function specificFabric($fabricID) {
        //Calls the getSpecificFabric from the FabricModel
        $fabricData['fabric'] = $this->FabricModel->getSpecificFabric($fabricID);

        //Loads the specificFabric view for the specificFabric page
        $view_data = array(
            'content' => $this->load->view('content/specificFabric', $fabricData, TRUE)
        );
        //Adds the partial view from the layout view
        $this->load->view('layout', $view_data);
    }

}
