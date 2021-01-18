<?php

class NotionController extends CI_Controller {

    //Parent Constructer
    function __construct() {
        parent::__construct();
        //Load required models etc. in constructor
        $this->load->model('NotionModel');
        //Load required libraries etc. in constructor
        $this->load->library('pagination');
    }

    function notionsSelect() {
        $notionOption = $this->input->post('notionOption');
        if ($notionOption === "all") {
            $this->notions();
        } else {
            //Calls the getSelectedNotionTypes from the NotionModel and passes in the $notionOption
            $notionData['notions'] = $this->NotionModel->getSelectedNotionTypes($notionOption);
            //Calls the getNotionTypes function from the NotionModel
            $notionData['notionTypes'] = $this->NotionModel->getNotionTypes();
            $notionData['count'] = 1;
            //Sets the $notionData variable into the associative array
            $notionData['selectedNotionType'] = $notionOption;

            //Loads the notions view for the notions page
            $view_data = array(
                'content' => $this->load->view('content/notions', $notionData, TRUE)
            );
            //Adds the partial view from the layout view
            $this->load->view('layout', $view_data);
        }
    }

    function notions() {
        // Count all record of table "notions" in database.
        $totalRec = $this->NotionModel->notion_count();
        //Sets the per page pagination as 6 per page
        $perPage = 6;

        //Pagination Configuration
        $config['base_url'] = site_url('NotionController/notions');
        $config['url_segment'] = 3;
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $perPage;

        //Initialise the Pagination ibrary
        $this->pagination->initialize($config);

        //Define Offset
        $page = $this->uri->segment(3);
        $offset = !$page ? 0 : $page;

        //Calls the getNotionsPerPage from the NotionModel and passes in the perpage and offset
        $notionData['notions'] = $this->NotionModel->getNotionsPerPage($perPage, $offset);
        //Calls the getNotionTypes function from the NotionModel
        $notionData['notionTypes'] = $this->NotionModel->getNotionTypes();
        $notionData['count'] = 1;

        //Loads the notions view for the notions page
        $view_data = array(
            'content' => $this->load->view('content/notions', $notionData, TRUE)
        );
        //Adds the partial view from the layout view
        $this->load->view('layout', $view_data);
    }

    function specificNotion($notionID) {
        //Calls the getSpecificNotion from the notionModel
        $notionData['notion'] = $this->NotionModel->getSpecificNotion($notionID);

        //Loads the specificNotion view for the specificNotion page
        $view_data = array(
            'content' => $this->load->view('content/specificNotion', $notionData, TRUE)
        );
        //Adds the partial view from the layout view
        $this->load->view('layout', $view_data);
    }

}
