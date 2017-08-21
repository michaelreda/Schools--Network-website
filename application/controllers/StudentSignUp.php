<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StudentSignUp extends CI_Controller {
  
    public function index() {
       $data['schools']=$this->Global_model->get_table_data('Schools');
        $this->load->view('templates/header_1');
         $this->load->view('templates/header_normal_page');
          $this->load->view('templates/menu');
        $this->load->view('studentSignUp',$data);
        $this->load->view('templates/footer_1');
        //$this->session->sess_destroy();
    }
    
    public function signup(){
             $Child_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'child_ssn' => $this->input->post('child_ssn'),
                'birth_date' => $this->input->post('birth_date'),
                'gender' => $this->input->post('gender'),
            );
            $Student_data = array(
                'child_ssn' => $this->input->post('child_ssn'),
                'school_name' => $this->input->post('school_name'),
                'school_address' => $this->input->post('school_address'),
                'grade' => $this->input->post('grade'),
            );


            $this->Global_model->global_insert('Children', $Child_data);
            $this->Global_model->global_insert('Students', $Student_data);
            
            redirect('home');
    }
   

}
