<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function index() {
        
       $data['Employees'] =  $this->Global_model->get_table_data("Employees");
       $data['Schools']=$this->db->query("exec view_schools2")->result();
        $this->load->view('templates/header_1');
        
        if($this->session->user_type != ""){
            $this->load->view('templates/header_normal_page');
        }else{
            $this->load->view('templates/header_landing_screen');
        }
        $this->load->view('templates/menu');
       //$this->load->view('templates/loader');
        $this->load->view('home2',$data);
        $this->load->view('templates/footer_1');
    }

   

}
