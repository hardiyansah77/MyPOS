<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();

		if($this->session->userdata('super_admin_is_logged_in')=='')
		{
		$this->session->set_flashdata('msg','Please Login to Continue');
		redirect('site');
		}
		$this->load->model('model');
		$this->load->model('m_cari');
    }
	
	public function index()
		{
			//echo '<pre>'; die(print_r($_SESSION));
			$dtDormitory = $this->model->selectdata('tbl_dormitory order by id')->result_array();
			$data = array(sfa
			'dtDormitory'		=> $dtDormitory,
				);
			$this->load->view('superadmin/header');
			$this->load->view('superadmin/index', $data);
			$this->load->view('superadmin/footer');
		}	
	
	public function maintainGrpProgram()
		{
			$dtGrpProgram = $this->model->selectdata('SE_GrpProgram order by grp_program_code')->result_array();
			$data = array(
			'dtGrpProgram'		=> $dtGrpProgram,
				);
			//echo '<pre>'; print_r($data); exit;
			$this->load->view('superadmin/header');
			$this->load->view('superadmin/maintainGrpProgram', $data);
			$this->load->view('superadmin/footer');
		}
		
		
	public function addGrpProgram()
		{
			$this->load->view('superadmin/header');
			$this->load->view('superadmin/formAddGrpProgram');
			$this->load->view('superadmin/footer');
		}
		
	public function actionAddGrpProgram()
	{

		$grp_program_code 	= $this->input->post('grp_program_code');
		$grp_program_name	= $this->input->post('grp_program_name');
		$grp_program_urut	= $this->input->post('grp_program_urut');
		$grp_program_icon	= $this->input->post('grp_program_icon');
		
		$data 		= array(
							'grp_program_code' 	=> $grp_program_code,
							'grp_program_name' 	=> $grp_program_name,
							'grp_program_urut' 	=> $grp_program_urut,
							'grp_program_icon' 	=> $grp_program_icon,
							);
					print_r($data);
					exit;
		$this->model->insertdata('SE_GrpProgram', $data);
		redirect('admin/maintainGrpProgram?message=input');
	}
		
	public function maintainProgram()
		{
			$dtProgram = $this->model->selectdata('tbl_dormitory order by id')->result_array();
			$data = array(
			'dtProgram'		=> $dtProgram,
				);
			$this->load->view('superadmin/header');
			$this->load->view('superadmin/maintainProgram', $data);
			$this->load->view('superadmin/footer');
		}
	
	public function maintainUser()
		{	
			$dtUser = $this->model->selectdata('SE_User where user_level_code is not null order by user_id desc')->result_array();
			$data = array(
			'dtUser'		=> $dtUser,
				);
				//echo '<pre>'; print_r($data); exit;
			$this->load->view('superadmin/header');
			$this->load->view('superadmin/maintainUser', $data);
			$this->load->view('superadmin/footer');
		}
		
	public function addUser()
		{
			$dtRoleUser = $this->model->selectdata('se_roleuser order by id_role')->result_array();
			$data = array(
			'dtRoleUser'		=> $dtRoleUser,
				);
			$this->load->view('superadmin/header');
			$this->load->view('superadmin/formAddUser', $data);
			$this->load->view('superadmin/footer');
		}
		
	public function actionAddUser()
	{

		$user_id 	= $this->input->post('user_id');
		$user_name 	= $this->input->post('user_name');
		$user_pwd 	= $this->input->post('user_pwd');
		$user_level_code 	= $this->input->post('user_level_code');
		
		$data 		= array(
							'user_id' 	=> $user_id,
							'user_name' 	=> $user_name,
							'user_pwd' 	=> $user_pwd,
							'user_level_code' 	=> $user_level_code,
							);
					//print_r($data);
					//exit;
		$this->model->insertdata('se_user', $data);
		redirect('admin/maintainUser?message=input');
	}
		
	public function maintainRoleUser()
		{
			$dtRoleUser = $this->model->selectdata('se_roleuser order by id')->result_array();
			$data = array(
			'dtRoleUser'		=> $dtRoleUser,
				);
			//echo '<pre>'; print_r($data); exit;
			$this->load->view('superadmin/header');
			$this->load->view('superadmin/maintainRoleUser', $data);
			$this->load->view('superadmin/footer');
		}
		
	public function addUserRole()
		{
			$this->load->view('superadmin/header');
			$this->load->view('superadmin/formAddUserRole');
			$this->load->view('superadmin/footer');
		}
		
	public function actionAddUserRole()
	{

		$kd_role 	= $this->input->post('kd_role');
		$role 	= $this->input->post('role');
		
		$data 		= array(
							'kd_role' 	=> $kd_role,
							'role' 	=> $role,
							);
					//print_r($data);
					//exit;
		$this->model->insertdata('se_roleuser', $data);
		redirect('admin/maintainRoleUser?message=input');
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
