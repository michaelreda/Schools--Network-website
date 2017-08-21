<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TeacherSignup extends CI_Controller {

    public function index() {
        $data['schools'] = $this->Global_model->get_table_data('Schools');
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('teacherSignup', $data);
        $this->load->view('templates/footer_1');
        //$this->session->sess_destroy();
    }

    public function signup() {
        $this->db->trans_start();
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'middle_name' => $this->input->post('middle_name'),
            'last_name' => $this->input->post('last_name'),
            'birth_date' => $this->input->post('birth_date'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'gender' => $this->input->post('gender'),
            'school_name' => $this->input->post('school_name'),
            'school_address' => $this->input->post('school_address'),
            
        );

        $this->Global_model->global_insert('Employees', $data);
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->show_message("an error has occurred please try again");
            $this->choose_school();
        } else {
            $this->show_message("signup complete");
            redirect('home');
        }
    }

    public function show_message($msg) {
        echo '<script language="javascript">';
        echo 'alert("' . $msg . '")';
        echo '</script>';
    }

}
