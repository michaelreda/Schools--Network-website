<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ParentSignup extends CI_Controller {
  
    public function index() {
     //  $data['schools']=$this->Global_model->get_table_data('Schools');
        $this->load->view('templates/header_1');
         $this->load->view('templates/header_normal_page');
          $this->load->view('templates/menu');
        $this->load->view('parentSignup');
        $this->load->view('templates/footer_1');
        //$this->session->sess_destroy();
    }
    
    public function signup(){
              $this->db->trans_start();
         $this->db->query('exec parent_signup "' . $this->input->post('parent_ssn') . '" , "' . $this->input->post('first_name') . '", "' . $this->input->post('last_name') . '", "' . $this->input->post('username') . '", "' . $this->input->post('password') . '", "' . $this->input->post('address') . '", "' . $this->input->post('gender') . '", "' . $this->input->post('email') . '", "' . $this->input->post('home_num') . '" ');
         $error=$this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->show_message("an error has occurred please try again");
            $this->choose_school();
        }else{
                $this->show_message("signup complete"); 
            redirect('home');
        }
        
       }
   
 public function show_message($msg){
        echo '<script language="javascript">';
        echo 'alert("'.$msg.'")';
        echo '</script>';
    }
    
}
