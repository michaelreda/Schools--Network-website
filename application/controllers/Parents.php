<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Parents extends CI_Controller {

    public function index() {

        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/Parent/parent');
        $this->load->view('templates/footer_1');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password'); //do_hash($this->input->post('password'), 'md5'); commented by michael

        $this->load->model('Parent_login_model');
        $check_login_result = $this->Parent_login_model->check_login($username, $password);

        if ($check_login_result) {
            redirect('Parents');
        } else {
            redirect('Home');
        }
    }

    public function view_apply_for_child() {
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/Parent/apply_for_child');
        $this->load->view('templates/footer_1');
    }

    public function apply_for_child() {
        $this->db->trans_start();
        $this->db->query('exec parent_apply_for_child "' . $this->session->parent_ssn . '" , "' . $this->input->post('child_ssn') . '" , "' . $this->input->post('first_name') . '", "' . $this->input->post('last_name') . '", "' . $this->input->post('birth_date') . '" , "' . $this->input->post('gender') . '", "' . $this->input->post('school_name') . '", "' . $this->input->post('school_address') . '"');
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->show_message("an error has occurred please try again");
            $this->view_apply_for_child();
        } else {
            $this->show_message("applied for your child successfully");
            $this->index();
        }
    }

    public function view_accepting_schools() {
        $data['schools'] = $this->db->query('exec Parent_view_schools_accepting_child "' . $this->session->parent_ssn . '"')->result();


        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/Parent/accepting_schools', $data);
        $this->load->view('templates/footer_1');
    }

    public function choose_school() {
        $this->db->trans_start();
        $this->db->query('exec Parent_choose_school "' . $this->input->post('child_ssn') . '" , "' . $this->input->post('school_name') . '", "' . $this->input->post('school_address') . '", "' . $this->input->post('grade') . '" ');
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->show_message("an error has occurred please try again");
            $this->choose_school();
        } else {
            $this->show_message(" your child has been enrolled successfully");
            $this->index();
        }
    }

    public function view_reports() {
        $data['reports'] = $this->db->query("exec parent_view_child_report  '" . $this->session->parent_ssn . "'")->result();


        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/Parent/view_reports', $data);
        $this->load->view('templates/footer_1');
    }

    public function reply_reports() {

        $this->db->trans_start();
        $this->db->query('exec Parent_replyto_report  "' . $this->input->post('teacher_id') . '" , "' . $this->input->post('student_id') . '" , "' . $this->input->post('child_ssn') . '" , "' . $this->session->parent_ssn . '" , "' . $this->input->post('reply') . '" ');
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->show_message("an error has occurred please try again");
            $this->view_reports();
        } else {
            $this->show_message("your reply has been submitted");
            $this->index();
        }
    }

    public function view_teachers() {
        $data['teachers'] = $this->db->query('exec view_children_teachers "' . $this->session->parent_ssn . '"')->result();
        
        foreach($data['teachers'] as $t){
             $t->rating= $this->db->query('exec View_overall_rating "' . $t->teacher_id . '"')->row(); 
        }
        
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/Parent/view_teachers', $data);
        $this->load->view('templates/footer_1');
    }

    public function rate_teacher() {


        $this->db->trans_start();
        $this->db->query('exec Parent_rate_teacher_proc "' . $this->session->parent_ssn . '" ,  "' . $this->input->post('teacher_id') . '" ,  "' . $this->input->post('rating') . '" ');
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            if (strpos($error['message'], 'duplicate') !== false) {
                $this->show_message("You have rated this teacher before");
            } else {
                $this->show_message("an error has occurred please try again");
            }
            $this->view_teachers();
        } else {
            $this->show_message("your rating has been submitted");
            $this->view_teachers();
        }
    }

    public function view_children_schools() {
        $data['schools'] = $this->db->query('exec parent_view_children_schools  "' . $this->session->parent_ssn . '"')->result();


        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/Parent/view_children_schools', $data);
        $this->load->view('templates/footer_1');
    }

    public function review_school() {

        $this->db->trans_start();
        $this->db->query('exec Parent_write_review1   "' . $this->session->parent_ssn . '" , "' . $this->input->post('school_name') . '" , "' . $this->input->post('school_address') . '" ,  "' . $this->input->post('review') . '" ');
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            if (strpos($error['message'], 'duplicate') !== false) {
                $this->show_message("You have reviewed this school before, if you want to change your review please delete your old review first.");
            } else {
                $this->show_message("an error has occurred please try again");
            }
             $this->view_children_schools();
        } else {
            $this->show_message("your reply has been submitted");
            $this->index();
        }
    }

    public function view_review() {
        $data['reviews'] = $this->db->query('exec view_review  "' . $this->session->parent_ssn . '" ')->result();


        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/Parent/view_reviews', $data);
        $this->load->view('templates/footer_1');
    }

    public function delete_review() {

        $this->db->trans_start();
        $this->db->query('exec Parent_delete_review   "' . $this->session->parent_ssn . '" , "' . $this->input->post('school_name') . '" , "' . $this->input->post('school_address') . '" ');
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->show_message("an error has occurred please try again");
            $this->view_review();
        } else {
            $this->show_message("your review to this school was deleted");
            $this->index();
        }
    }

    public function show_message($msg) {
        echo '<script language="javascript">';
        echo 'alert("' . $msg . '")';
        echo '</script>';
    }

}
