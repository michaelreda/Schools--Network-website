<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends CI_Controller {

    public function index() {
        $data['courses'] = $this->db->query('exec View_assigned_couses "' . $this->session->grade . '","' . $this->session->school_name . '","' . $this->session->school_address . '"')->result();

        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/student/student', $data);
        $this->load->view('templates/footer_1');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password'); //do_hash($this->input->post('password'), 'md5'); commented by michael

        $this->load->model('Student_login_model');
        $check_login_result = $this->Student_login_model->check_login($username, $password);

        if ($check_login_result) {
            redirect('Student');
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

     public function view_update_profile() {
        $this->db->where('student_id', $this->session->id);
        $data['student_info'] = $this->db->get('Students')->row();
        $this->db->where('child_ssn', $data['student_info']->child_ssn);
        $data['child_info'] = $this->db->get('Children')->row();
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/student/update_profile', $data);
        $this->load->view('templates/footer_1');
    }
    
    public function update_profile() {
        $this->db->trans_start();
        $this->db->query('exec Student_update_account "'  . $this->session->id . '" , "' . $this->session->child_ssn . '" , "' . $this->input->post('password') . '" , "' . $this->input->post('first_name'). '" , "' . $this->input->post('last_name'). '" , "' . $this->input->post('birth_date') . '"')->result();
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            
                $this->show_message("error occurred please try again later");
           
        } else {
            $this->session->name=  $this->input->post('first_name').' '.$this->input->post('last_name');
            $this->show_message("profile edited");
        }
        $this->index();
    }
    
    public function view_my_courses() {

        $data['courses'] = $this->db->query('exec View_assigned_couses "' . $this->session->grade . '" , "' . $this->session->school_name . '" , "' . $this->session->school_address . '"')->result();
        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/student/view_my_courses', $data);
        $this->load->view('templates/footer_1');
    }

    public function view_ask_question() {
        $data['courses'] = $this->db->query('exec View_assigned_couses "' . $this->session->grade . '" , "' . $this->session->school_name . '" , "' . $this->session->school_address . '"')->result();

        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/student/ask_question', $data);
        $this->load->view('templates/footer_1');
    }

    public function ask_question() {
         
        $this->db->where('course_code', $this->input->post('course_code'));
        $course_has_students = $this->db->get('Course_has_Students')->result();
       $this->db->trans_start();
        $this->db->query('exec Ask_question_in_course2 "' . $this->input->post('course_code') . '" , "' . $this->session->id . '" , "' . $this->session->child_ssn . '" , "' . $this->input->post('question') . '" , "' . $course_has_students[0]->teacher_id . '"')->result();
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            if (strpos($error['message'], 'duplicate') !== false) {
                $this->show_message("You have asked this question before");
            } else {
                $this->show_message($error['message']);
            }
        } else {
            $this->show_message("question asked, check again later for your teacher's reply");
        }
        
        $this->index();
    }

    public function view_questions_in_course() {
        $input_date = $this->input->post();
        $data['questions'] = $this->db->query("exec View_question_in_course '" . $this->input->post('course_code') . "'")->result();

        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/student/quesions_in_course', $data);
        $this->load->view('templates/footer_1');
    }

    public function view_assignments_in_course() {
        $data['assignments'] = $this->db->query("exec assignments_in_course2 '" . $this->input->post('course_code') . "'")->result();

        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/student/assignments_in_course', $data);
        $this->load->view('templates/footer_1');
    }

    public function view_submit_assignment() {

        $data['assignments'] = $this->db->query("exec assignments_in_course2 '" . $this->input->post('course_code') . "'")->result();
        $data['course_code'] = $this->input->post('course_code');

        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/student/submit_assignment', $data);
        $this->load->view('templates/footer_1');
    }

    public function submit_assignment() {
      
        $this->db->where('course_code', $this->input->post('course_code'));
        $course_has_students = $this->db->get('Course_has_Students')->result();
        
        $this->db->trans_start();
        $this->db->query('exec Solve_assignments "' . $this->input->post('course_code') . '" , "' . $course_has_students[0]->teacher_id . '" , "' . $this->session->id . '" , "' . $this->session->child_ssn . '" , "' . $this->input->post('post_date') . '" , "' . $this->input->post('answer') . '"');
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            if (strpos($error['message'], 'duplicate') !== false) {
                $this->show_message("You have submitted an answer for this assignment before");
            } else {
                $this->show_message($error['message']);
            }
        } else {
            $this->show_message("Your assignment is submitted successfully");
        }
        
        $this->index();
    }

    public function view_grades() {
        $data['courses'] = $this->db->query('exec View_assigned_couses "' . $this->session->grade . '" , "' . $this->session->school_name . '" , "' . $this->session->school_address . '"')->result();
        $data['grades'] = $this->db->query('exec View_assignment_grades "' . $this->session->id . '" , "' . $this->session->child_ssn . '"')->result();


        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/student/view_grades', $data);
        $this->load->view('templates/footer_1');
    }

    public function view_activities() {
        $data['activities'] = $this->db->query('exec Students_view_activities "' . $this->session->id . '" , "' . $this->session->child_ssn . '"')->result();


        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/student/view_activities', $data);
        $this->load->view('templates/footer_1');
    }

    public function join_activity() {
       
        $this->db->trans_start();
        $this->db->query('exec apply_for_activity "' . $this->session->id . '" , "' . $this->session->child_ssn . '" , "' . $this->input->post('date') . '" , "' . $this->input->post('location') . '"');
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            if (strpos($error['message'], 'duplicate') !== false) {
                $this->show_message("You are already Joining this activity");
            } else if(strpos($error['message'], 'two activities') !== false){
                 $this->show_message("You can not join two activities of the same type on the same date");
            }else{
                $this->show_message($error['message']);
            }
            //$this->show_message("an error occurred please try again later");
        } else {
            $this->show_message("joined club successfully");
        }
        // $this->show_message("joined activity successfully");

        $data['activities'] = $this->db->query('exec Students_view_activities "' . $this->session->id . '" , "' . $this->session->child_ssn . '"')->result();


        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/student/view_activities', $data);
        $this->load->view('templates/footer_1');
    }

    public function view_clubs() {


        $data['clubs'] = $this->db->query('exec view_clubs "' . $this->session->school_name . '" , "' . $this->session->school_address . '"')->result();


        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/student/view_clubs', $data);
        $this->load->view('templates/footer_1');
    }

    public function join_club() {
        $this->db->trans_start();
        $this->db->query('exec Students_join_clubs "' . $this->session->id . '" , "' . $this->session->child_ssn . '" , "' . $this->input->post('club_name') . '"');
        $error = $this->db->error();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            if (strpos($error['message'], 'duplicate') !== false) {
                $this->show_message("You are already Joining this club");
            } else {
                $this->show_message($error['message']);
            }
            //$this->show_message("an error occurred please try again later");
        } else {
            $this->show_message("joined club successfully");
        }
        $data['clubs'] = $this->db->query('exec view_clubs "' . $this->session->school_name . '" , "' . $this->session->school_address . '"')->result();


        $this->load->view('templates/header_1');
        $this->load->view('templates/header_normal_page');
        $this->load->view('templates/menu');
        $this->load->view('/student/view_clubs', $data);
        $this->load->view('templates/footer_1');
    }

    public function show_message($msg) {
        echo '<script language="javascript">';
        echo 'alert("' . $msg . '")';
        echo '</script>';
    }

}
