<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Student_login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    
    
    function check_login($username,$password)
    {
        
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $get_student_info = $this->db->get("Students")->row();
        $this->db->where("child_ssn", $get_student_info->child_ssn);
        $get_child_info = $this->db->get("Children")->row();
        
        
        if($get_student_info)
        {
            
            //add user data to session
            $new_data = array(
                'id'=>$get_student_info->student_id,
                'child_ssn' => $get_child_info->child_ssn,
                'name' => $get_child_info->first_name.$get_child_info->last_name,
                'user_type'=>"student",
                'grade'=>$get_student_info->grade,
                'school_name'=>$get_student_info->school_name,
                'school_address'=>$get_student_info->school_address,
            );
            $this->session->set_userdata($new_data);
            return TRUE;
            
        }
        else
        {
            
            return FALSE;
        }
    }
}