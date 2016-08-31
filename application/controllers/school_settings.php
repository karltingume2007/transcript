<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class school_settings extends MY_Controller {

    public function index()
    {
        $this->LoadViewHeader();
        $this->load->view('school_configuration/school_settings');
        $this->LoadViewFooter('school_configuration/school_settings_js');
    }
    
    public function get_all_schools() {
        $school = new school();
        $return_value = array();        
        foreach($school->get() as $school_object)
        {
            $scl = (array)$school_object;
            $scl['school_programs'] = $school_object->get_programs();
            $return_value[] = $scl;
        }
        echo json_encode($return_value);
    }
    
    
    public function save_school(){
        $data = json_decode(file_get_contents("php://input"));
        //show_array($data);
        
        $school = new school();
        $school->school_id = isset($data->school_id)? $data->school_id : 0;
        $school->school_name = $data->school_name;
        $school->save();
        //show_array($school);
   
        $programs = array();
        
        foreach($data->school_programs as $p){
            $prog = new school_program();
            $prog->program_id = isset($p->program_id)? $p->program_id : 0;
            $prog->program_name = $p->program_name;
            $prog->school_id = $school->school_id;
            $prog->save();
            $programs[] = $prog;
            //show_array($prog);
        }
        
        $school->delete_programs($programs);
        
        $sc = (array)$school;
        $sc['school_programs'] = $programs;
        
        echo json_encode($sc);
    }
}