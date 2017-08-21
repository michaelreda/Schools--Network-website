<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    
    
    function check_login($username,$password)
    {
        
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $get_employees_info = $this->db->get("Employees")->row();
        $this->db->where("employee_id", $get_employees_info->employee_id);
        $get_admin_info = $this->db->get("Admins")->row();
        
        
        if($get_admin_info)
        {
            
            //add user data to session
            $new_data = array(
                'id'=>$get_admin_info->employee_id,
               
                'name' => $get_employees_info->first_name.' '.$get_employees_info->middle_name.' '.$get_employees_info->last_name,
                'user_type'=>"admin",
                'school_name'=>$get_employees_info->school_name,
                'school_address'=>$get_employees_info->school_address,
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