<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class School extends CI_Controller {
  
    public function view_school_info($school_name,$school_address) {
        $school_name = str_replace("%20", " ", $school_name);
        $school_address = str_replace("%20", " ", $school_address);
       $data['info']=$this->db->query('exec view_info_reviews_teachers_of_school2 "'.$school_name.'" , "'.$school_address.'"')->result();
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/school/view_school_info',$data);
        $this->load->view('templates/footer_1');
        
    }
    
    public function view_school_reviews($school_name,$school_address) {
        $school_name = str_replace("%20", " ", $school_name);
        $school_address = str_replace("%20", " ", $school_address);
       $data['reviews']=$this->db->query('exec view_reviews_of_school2 "'.$school_name.'" , "'.$school_address.'"')->result();
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/school/view_school_reviews',$data);
        $this->load->view('templates/footer_1');
        
    }
   
     public function view_school_announcements($school_name,$school_address) {
        
        $school_name = str_replace("%20", " ", $school_name);
        $school_address = str_replace("%20", " ", $school_address);
       $data['announcements']=$this->db->query('exec view_announcements_of_school2 "'.$school_name.'" , "'.$school_address.'"')->result();
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/school/view_school_announcements',$data);
        $this->load->view('templates/footer_1');
        
    }
    
}
