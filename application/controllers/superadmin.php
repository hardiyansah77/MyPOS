<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {
	public function __construct()
		{
			parent::__construct();

			if($this->session->userdata('super_admin_is_logged_in')=='')
			{
			$this->session->set_flashdata('msg','Please Login to Continue');
			redirect('site');
			}
			$this->load->model('model');
			//$this->load->model('m_cari');
		}
	
	public function index()
		{
			$this->load->view('superadmin/header');
			$this->load->view('superadmin/dashboard');
		}
	
	public function logout()
		{
				$array_items = array(   
							'super_admin_username',
							'super_admin_password' ,
							'super_admin_level' ,
							'super_admin_id',
							'super_admin_is_logged_in'
							);
			$this->session->unset_userdata($array_items);
			 $this->session->set_flashdata('msg', 'Staff Signed Out Now!');
				redirect('site');
		}
}
