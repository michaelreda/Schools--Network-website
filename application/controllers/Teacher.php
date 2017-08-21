<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teacher extends CI_Controller {

    public function index() {
        $data['courses'] = $this->db->query('exec View_courses "' . $this->session->id. '"')->result();

        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/teacher/teacher',$data);
        $this->load->view('templates/footer_1');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password'); //do_hash($this->input->post('password'), 'md5'); commented by michael

        $this->load->model('Teacher_login_model');
        $check_login_result = $this->Teacher_login_model->check_login($username, $password);

        if ($check_login_result) {
            redirect('Teacher');
        } else {
            redirect('Home');
        }
    }

    public function view_courses() {

        $data['courses'] = $this->db->query('exec View_courses "' . $this->session->id . '"')->result();
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/Teacher/view_courses', $data);
        $this->load->view('templates/footer_1');
    }

    public function view_post_assignment() {
        $data['courses'] = $this->db->query('exec View_courses "' . $this->session->id. '"')->result();

        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/teacher/post_assignment', $data);
        $this->load->view('templates/footer_1');
    }

    public function post_assignment() {
        $this->db->where('course_code', $this->input->post('course_code'));
        $this->db->query('exec post_assignment "' . $this->input->post('course_code') . '" , "' . $this->session->id . '" , "' . $this->input->post('date'). '" , "' . $this->input->post('title') . '" , "' . $this->input->post('assignment') . '"')->result();
        $this->show_message("assignement posted successfully");
        redirect('Teacher');
    }
    public function view_write_report() {
        $data['students'] = $this->db->query('exec view_my_students3 "' . $this->session->id. '" , "'. $this->input->post('course_code'). '"')->result();

        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/teacher/write_report', $data);
        $this->load->view('templates/footer_1');
    }

    public function answer_question() {
        //$this->db->where('course_code', $this->input->post('course_code'));
        $this->db->query('exec answer_questions "'.$this->input->post('course_code').'" , "'. $this->input->post('student_id') .  '" , "'  . $this->input->post('date') .  '" , "' .$this->session->id. '" , "' . $this->input->post('answer') . '"')->result();
        $this->show_message("question answered");
        $this->view_questions();
    }
public function view_questions() {
        $data['questions'] = $this->db->query('exec view_questions1 "' . $this->session->id. '" , "'. $this->input->post('course_code'). '"')->result();
        $data['course_code']= $this->input->post('course_code');
        
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/teacher/view_questions', $data);
        $this->load->view('templates/footer_1');
    }

    public function write_report() {
        //$this->db->where('course_code', $this->input->post('course_code'));
        $this->db->query('exec write_report "'.$this->session->id.  '" , "'  . $this->input->post('student_id') . '" , "' . $this->input->post('child_ssn') . '" , "' . $this->input->post('comment') . '"')->result();
        $this->show_message("report submitted ");
        $this->index();
    }
    public function view_students() {
        
        $data['students'] = $this->db->query("exec View_my_students'" .$this->session->id. "'")->result();

        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/Teacher/view_students', $data);
        $this->load->view('templates/footer_1');
    }

    public function view_solutions() {


        $data['assignments'] = $this->db->query('exec get_assignments_solutions2 "' . $this->session->id .'","'.$this->input->post('post_date'). '"')->result();


        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/Teacher/view_assignments', $data);
        $this->load->view('templates/footer_1');
        
    }

    public function view_assignments_in_course() {
        $data['assignments'] = $this->db->query("exec assignments_in_course '" . $this->input->post('course_code') . "'")->result();

        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/teacher/assignments_in_course', $data);
        $this->load->view('templates/footer_1');
    }
    
    public function grade_assignments() {
        $this->db->trans_start();
        $this->db->query('exec grade_assignments "' . $this->input->post('course') . '" , "' . $this->session->id . '" , "' . $this->input->post('student_id'). '" , "' . $this->input->post('post_date') . '" , "' . $this->input->post('child_ssn'). '" , "' . $this->input->post('score') . '"');
        $error=$this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
             if (strpos($error['message'], 'duplicate') !== false) {
                $this->show_message("You have graded this assignment before");
            } else {
                $this->show_message($error['message']);
            }
        }else{
            $this->show_message("assignment graded");
        }
        $this->index();
    }
    
    public function show_message($msg){
        echo '<script language="javascript">';
        echo 'alert("'.$msg.'")';
        echo '</script>';
    }
}
