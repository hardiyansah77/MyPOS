<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
           $this->load->model('model');                 
           //$this->load->model('m_cari');                 
    }

	public function index()
	{
		$this->load->view('site/login');
	}

	 function validate()
    {  

         $user_id = $this->input->post('user_id');
         $user_pwd = $this->input->post('user_pwd');
         $is_valid = $this->model->validate($user_id, $user_pwd);
		 //echo '<pre>'; print_r($is_valid);exit;	
         if($is_valid)/*If valid username and password set */
         {
             $get_admin = $this->model->get_admin($user_id, $user_pwd);  
			//print_r($get_admin);exit;	
			//echo '<pre>'; die(print_r($get_admin));		
            foreach($get_admin as $val)
                { 
                     $user_id=$val->user_id;
                     $user_name = $val->user_name;                                   
                     $user_pwd = $val->user_pwd;                 
                     $user_level_code=$val->user_level_code;

                     if($user_level_code=='SA')
                     {
                        $data = array(
                        'super_admin_username' =>$user_name, 
                        'super_admin_password' => $user_pwd,
                        'super_admin_level'=>$user_level_code,
                        'super_admin_id'=>$user_id,
                        'super_admin_is_logged_in' => true
                        );	
                          $this->session->set_userdata($data); /*Here  setting the Admin datas in session */
                          redirect('superadmin');
                     }
                    if($user_level_code=='A')
                     { 
                        $data = array(
                        'admin_username' =>$user_name, 
                        'admin_password' =>$user_pwd,
                        'admin_level'=>$user_level_code,
                        'admin_id'=>$user_id,
                        'admin_is_logged_in' => true
                        );
                          $this->session->set_userdata($data); /*Here  setting the  staff datas values in session */
                          redirect('admin');
                     }  
            }       
        }
        else // incorrect username or password
        {
            $this->session->set_flashdata('msg1', 'Username or Password Incorrect!');
            redirect('site');
        }
    }
}