<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index() {

        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/admin/admin');
        $this->load->view('templates/footer_1');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password'); //do_hash($this->input->post('password'), 'md5'); commented by michael

        $this->load->model('Admin_login_model');
        $check_login_result = $this->Admin_login_model->check_login($username, $password);

        if ($check_login_result) {
            redirect('Admin');
        } else {
            redirect('Home');
        }
    }

    public function view_profile() {
        $this->db->where('student_id', $this->session->id);
        $data['student_info'] = $this->db->get('Students')->row();
        $this->db->where('child_ssn', $data['student_info']->child_ssn);
        $data['child_info'] = $this->db->get('Children')->row();
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/student/view_profile', $data);
        $this->load->view('templates/footer_1');
    }

    public function view_unverified_teachers() {

        $data['teachers'] = $this->db->query('exec view_teachers_signed_up "' . $this->session->id . '"')->result();
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/admin/view_unverified_teachers', $data);
        $this->load->view('templates/footer_1');
    }

    public function verify_teacher() {
        $this->db->trans_start();
        $this->db->query('exec verify_teacher_and_set_salary "' . $this->input->post('employee_id') . '"');
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->show_message("there was an error try again later");
        } else {
            $this->show_message("verified teacher successfully");
        }
        $this->view_unverified_teachers();
    }

    public function view_applying_students() {

        $data['students'] = $this->db->query('exec view_applying_students "' . $this->session->school_name . '" , "' . $this->session->school_address . '"')->result();
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/admin/view_applying_students', $data);
        $this->load->view('templates/footer_1');
    }

    public function accept_student() {
        $this->db->trans_start();
        $this->db->query('exec accept_reject_applicants "' . '1" , "' . $this->input->post('child_ssn') . '" , "' . $this->session->id . '"');
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->show_message("there was an error try again later");
        } else {
            $this->show_message("student accepted successfully");
        }
        $this->view_applying_students();
    }

    public function reject_student() {
        $this->db->trans_start();
        $this->db->query('exec accept_reject_applicants "' . '0" , "' . $this->input->post('child_ssn') . '" , "' . $this->session->id . '"');
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->show_message("there was an error try again later");
        } else {
            $this->show_message("student rejected successfully");
        }
        $this->view_applying_students();
    }

    public function view_unverified_students() {

        $data['students'] = $this->db->query('exec view_unverified_students "' . $this->session->id . '"')->result();
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/admin/view_unverified_students', $data);
        $this->load->view('templates/footer_1');
    }

    public function verify_student() {
        $this->db->trans_start();
        $this->db->query('exec verify_student "' . $this->input->post('student_id') . '"');
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->show_message("there was an error try again later");
        } else {
            $this->show_message("verified student successfully");
        }
        $this->view_unverified_students();
    }

    public function view_post_announcement() {

        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/Admin/post_announcement');
        $this->load->view('templates/footer_1');
    }

    public function post_announcement() {
        $this->db->query('exec post_announcements "' . $this->input->post('title') . '" , "' . $this->session->id . '" , "' . $this->input->post('description') . '" , "' . $this->input->post('type') . '"')->result();
        $this->show_message("Announcement Posted");
        redirect('Admin');
    }

    public function edit_school() {
        $this->session->school_name = $this->input->post('name');
        $this->session->school_address = $this->input->post('address');

        $this->db->query('exec update_a_school "' . $this->input->post('name') . '" , "' . $this->input->post('address') . '" , "' . $this->input->post('phone') . '" , "' . $this->input->post('info') . '" , "' .
                $this->input->post('email') . '" , "' . $this->input->post('type') . '" , "' . $this->input->post('language') . '" , "' . $this->input->post('vision') . '" , "' . $this->input->post('mission') . '" , "' .
                $this->input->post('url') . '" , "' . $this->input->post('fees') . '" , "' . $this->session->id . '"')->result();
        $this->show_message("school info editted successfully");
        redirect('Admin');
    }

    public function view_edit_school() {
        $data['info'] = $this->db->query('exec view_info_reviews_teachers_of_school2 "' . $this->session->school_name . '" , "' . $this->session->school_address . '"')->result();
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/Admin/edit_school', $data);
        $this->load->view('templates/footer_1');
    }

    public function view_create_activity() {

        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/Admin/create_activity');
        $this->load->view('templates/footer_1');
    }

    public function create_activity() {
        $this->db->trans_start();
        $this->db->query('exec create_activities "' . $this->input->post('date') . '" , "' . $this->input->post('location') . '" , "' . $this->input->post('description') . '" , "' . $this->input->post('type') . '" , "' .
                $this->input->post('equipment') . '" , "' . $this->session->id . '" , "' . $this->input->post('teacher') . '"')->result();
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->show_message("there was an error try again later");
        } else {
            $this->show_message("activity created successfully");
        }
        redirect('Admin');
    }

    public function view_assign_teachers_to_courses() {
        $this->db->select('*');
        $this->db->from('Courses');
        $this->db->where('school_name', $this->session->school_name);
        $this->db->where('school_address', $this->session->school_address);
        $data['courses'] = $this->db->get()->result();


        $this->db->select('*');
        $this->db->from('Employees');
        $this->db->join('Teachers', 'Employees.employee_id = Teachers.employee_id');
        $this->db->where('school_name', $this->session->school_name);
        $this->db->where('school_address', $this->session->school_address);
        $data['teachers'] = $this->db->get()->result();

       
        
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/Admin/assign_teachers_to_courses',$data);
        $this->load->view('templates/footer_1');
    }

    public function assign_teachers_to_courses() {

        $this->db->query('exec assign_teachers_to_courses2 "' . $this->input->post('course') . '" , "' . $this->input->post('teacher') . '" , "' . $this->session->id . '"')->result();
        $this->show_message("teacher assigned");
        redirect('Admin');
    }

    public function show_message($msg) {
        echo '<script language="javascript">';
        echo 'alert("' . $msg . '")';
        echo '</script>';
    }

}
