<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends MY_Controller {

    public function index()
    {
        $this->LoadViewHeader();
        $this->load->view('enrolments/enrolment');
        $this->LoadViewFooter('enrolments/enrolment_js');
    }
}