<?php

class ClassController extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('ClassModel');

        $prefs = array(
            'month_type' => 'long',
            'day_type' => 'short',
            'show_next_prev' => true,
            'next_prev_url' => site_url('ClassController/classes/')
        );


        $this->prefs['template'] = '

        {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}

        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
        {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
';


        $this->load->library('calendar', $prefs);
    }

    function classes($year = NULL, $month = NULL) {
        if ($year === NULL) {
            $year = (int) date("Y");
        }

        if ($month === NULL) {
            $month = (int) date("n");
        }

        $data['year'] = $year;
        $data['month'] = $month;
        $classes = $this->ClassModel->getAllClasses();

        if ($classes->num_rows() > 0) {
            $cal = array();

            foreach ($classes->result() as $c) {
                $calender_date = date("Y-m-j", strtotime($c->dateOfClass));
                if (substr($calender_date, 0, 4) == $year && substr($calender_date, 5, 2) == $month) {
                    $cal[substr($calender_date, 8, 2)] = site_url('ClassController/class/' . $c->dateOfClass);
                }
            }
            $data['cal'] = $cal;
        }
        $view_data = array(
            'content' => $this->load->view('content/classes', $data, TRUE),
        );

        $this->load->view('layout', $view_data);
    }

    function class($date) {
        $data['classes'] = $this->ClassModel->getClass($date);

        $view_data = array(
            'content' => $this->load->view('content/class', $data, TRUE),
        );

        $this->load->view('layout', $view_data);
    }

}
