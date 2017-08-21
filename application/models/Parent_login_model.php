<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Parent_login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    
    
    function check_login($username,$password)
    {
        
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $get_Parent_info = $this->db->get("Parents")->row();
        
       // $get_child_info = $this->db->get("Children")->row();
        
        
        if($get_Parent_info)
        {
            
            //add user data to session
            $new_data = array(
               
                'parent_ssn' => $get_Parent_info->parent_ssn,
                'name' => $get_Parent_info->first_name.' '.$get_Parent_info->last_name,
                'user_type'=>"parent",
                'address'=> $get_Parent_info->address,
                'gender'=>$get_Parent_info->gender,
                'email'=>$get_parent_info->email,
                'contact number'=>$get_parent_info->home_num,
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