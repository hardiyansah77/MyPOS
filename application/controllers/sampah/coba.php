<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Coba extends CI_Controller {
	public function __construct()
    {
        parent::__construct();

		if($this->session->userdata('admin_is_logged_in')=='')
		{
		$this->session->set_flashdata('msg','Please Login to Continue');
		redirect('site');
		}
		$this->load->model('model');
		//$this->load->model('m_cari');
    }
	
	public function index()
	{
		//echo '<pre>'; die(print_r($_SESSION));
		$this->load->view('pos/dormitory/header');
		$this->load->view('pos/dormitory/index');
		$this->load->view('pos/dormitory/footer');
	}
	
	public function dataDormitory()
	{
		$dtDormitory = $this->model->selectdata('tbl_dormitory order by id')->result_array();
		$data = array(
		'dtDormitory'	=> $dtDormitory,
			);

		$this->load->view('pos/dormitory/header', $data);
		$this->load->view('pos/dormitory/dataDormitory', $data);
		$this->load->view('pos/dormitory/footer');
	}
	
	public function addDataDormitory()
	{
		$this->load->view('pos/dormitory/header');
		$this->load->view('pos/dormitory/formAddDataDormitory');
		$this->load->view('pos/dormitory/footer');
	}
	
	public function actionAddDataDormitory()
	{

		$floor 		= $this->input->post('floor');
		$type		= $this->input->post('type');
		$bed		= $this->input->post('bed');
		$room_size	= $this->input->post('room_size');
		$qty_male	= $this->input->post('qty_male');
		$qty_female	= $this->input->post('qty_female');
		$facilities	= $this->input->post('facilities');
		$price		= $this->input->post('price');
		
		$data 		= array(
							'floor' 		=> $floor,
							'type' 			=> $type,
							'bed' 			=> $bed,
							'room_size' 	=> $room_size,
							'qty_male' 		=> $qty_male,
							'qty_female' 	=> $qty_female,
							'facilities' 	=> $facilities,
							'price' 		=> $price,
							);
		$this->model->insertdata('tbl_dormitory', $data);
					//print_r($data);
					//exit;
		redirect('coba/dataDormitory?message=input');
	}
	
	public function detailDormitory($id)
	{
		$where = array('id' => $id);
		$data['tbl_dormitory'] = $this->model->edit_data($where,'tbl_dormitory')->result();
		$this->load->view('pos/dormitory/header');
		$this->load->view('pos/dormitory/detailDormitory',$data);
		$this->load->view('pos/dormitory/footer');
	}
	
	public function editDataDormitory($id)
	{
		$where = array('id' => $id);
		$data['tbl_dormitory'] = $this->model->edit_data($where,'tbl_dormitory')->result();
		$this->load->view('pos/dormitory/header');
		$this->load->view('pos/dormitory/formEditDataDormitory',$data);
		$this->load->view('pos/dormitory/footer');
	}
	
	public function upadteDataDormitory()
	{
		$id 	 	= $this->input->post('id');
		$floor 		= $this->input->post('floor');
		$type		= $this->input->post('type');
		$bed		= $this->input->post('bed');
		$room_size	= $this->input->post('room_size');
		$qty_male	= $this->input->post('qty_male');
		$qty_female	= $this->input->post('qty_female');
		$facilities	= $this->input->post('facilities');
		$price		= $this->input->post('price');
	 
		$data 		= array(
							'floor' 		=> $floor,
							'type' 			=> $type,
							'bed' 			=> $bed,
							'room_size' 	=> $room_size,
							'qty_male' 		=> $qty_male,
							'qty_female' 	=> $qty_female,
							'facilities' 	=> $facilities,
							'price' 		=> $price,
							);
	 
		$where = array('id' => $id);
	 
		$this->model->update_data($where,$data,'tbl_dormitory');
		redirect('coba/dataDormitory?message=update');
	}
	
	public function deleteDataDormitory($id = '')
	{
		$deldata	= $this->model->deldata('tbl_dormitory',array('id' => $id));
		redirect('coba/dataDormitory?message=delete');
	}
	
	public function dataDormitoryTransaction()
	{
		$ttlMale				= $this->model->selectsum('qty_male','tbl_dormitory');
		$ttlFemale				= $this->model->selectsum('qty_female','tbl_dormitory');
		$orderMale 				= $this->model->selectcount('id_transaction','tbl_dormitory_transaction where gender = "L"');
		$orderFemale 			= $this->model->selectcount('id_transaction','tbl_dormitory_transaction where gender = "P"');
		$orderAll 				= $this->model->selectcount('id_transaction','tbl_dormitory_transaction');
		$dtDormitoryTransaction = $this->model->selectdata('tbl_dormitory_transaction order by id_transaction')->result_array();
		$data = array(
		'ttlMale'					=> $ttlMale,
		'ttlFemale'					=> $ttlFemale,
		'orderMale'					=> $orderMale,
		'orderFemale'				=> $orderFemale,
		'orderAll'					=> $orderAll,
		'dtDormitoryTransaction'	=> $dtDormitoryTransaction,
			);
		//echo '<pre>'; print_r($data);exit;
		$this->load->view('pos/dormitory/header');
		$this->load->view('pos/dormitory/dataDormitoryTransaction', $data);
		$this->load->view('pos/dormitory/footer');
	}
	
	public function formAddDataDormitoryTransaction()
	{
		$dtDormitoryTransaction = $this->model->selectdata2('unit_name','TblUnitSekolah WHERE unit_not_active<>"Y"')->result_array();
		$dtFloor 				= $this->model->selectfloor('floor','tbl_dormitory')->result_array();
		$data = array(
					  'dtDormitoryTransaction'		=> $dtDormitoryTransaction,
					  'dtFloor'						=> $dtFloor,
					  );
		//die(json_encode($data));
		$this->load->view('pos/dormitory/header');
		$this->load->view('pos/dormitory/formAddDataDormitoryTransaction', $data);
		$this->load->view('pos/dormitory/footer');
	}
	
	public function actionAddDataDormitoryTransaction()
	{
		$jenjang 		= $this->input->post('jenjang');
		$siswa_nopin	= $this->input->post('siswa_nopin');
		$gender			= $this->input->post('gender');
		$parent			= $this->input->post('parent');
		$class			= $this->input->post('class');
		$floor			= $this->input->post('floor');
		$type			= $this->input->post('type');
		$room_number	= $this->input->post('room_number');
		$price			= $this->input->post('price');
		
		$data 			= array(
								'jenjang' 		=> $jenjang,
								'siswa_nopin' 	=> $siswa_nopin,
								'gender' 		=> $gender,
								'parent' 		=> $parent,
								'class' 		=> $class,
								'floor' 		=> $floor,
								'type' 			=> $type,
								'room_number' 	=> $room_number,
								'price' 		=> $price,
								);
		$this->model->insertdata('tbl_dormitory_transaction', $data);
					//print_r($data);
					//exit;
		redirect('coba/dataDormitoryTransaction?message=input');
	}
	
	public function editDataDormitoryTransaction($id_transaction)
	{	
		$dtDormitoryTransaction = $this->model->selectdata2('unit_name','TblUnitSekolah WHERE unit_not_active<>"Y"')->result_array();
		$dtFloor 				= $this->model->selectfloor('floor','tbl_dormitory')->result_array();
		$where = array('id_transaction' => $id_transaction);
		$data1['tbl_dormitory_transaction'] = $this->model->edit_data($where,'tbl_dormitory_transaction')->result();
		//print_r($data);
					//exit;
		$data = array(
						'data1'							=> $data1,
						'dtDormitoryTransaction'		=> $dtDormitoryTransaction,
						'dtFloor'						=> $dtFloor,
			);
		$this->load->view('pos/dormitory/header');
		$this->load->view('pos/dormitory/formEditDataDormitoryTransaction',$data);
		$this->load->view('pos/dormitory/footer');
	}
	
	public function updateDataDormitoryTransaction()
	{
		$id_transaction	= $this->input->post('id_transaction');
		$jenjang 		= $this->input->post('jenjang');
		$siswa_nopin	= $this->input->post('siswa_nopin');
		$gender			= $this->input->post('gender');
		$parent			= $this->input->post('parent');
		$class			= $this->input->post('class');
		$floor			= $this->input->post('floor');
		$type			= $this->input->post('type');
		$room_number	= $this->input->post('room_number');
		$price			= $this->input->post('price');
	 
		$data 		= array(
							'jenjang' 		=> $jenjang,
							'siswa_nopin' 	=> $siswa_nopin,
							'gender' 		=> $gender,
							'parent' 		=> $parent,
							'class' 		=> $class,
							'floor' 		=> $floor,
							'type' 			=> $type,
							'room_number' 	=> $room_number,
							'price' 		=> $price,
							);
	 
		$where = array('id_transaction' => $id_transaction);
	 
		$this->model->update_data($where,$data,'tbl_dormitory_transaction');
		redirect('coba/dataDormitoryTransaction?message=update');
	}
	
	public function deleteDataDormitoryTransaction($id_transaction = '')
	{
		$deldata	= $this->model->deldata('tbl_dormitory_transaction',array('id_transaction' => $id_transaction));
		redirect('coba/dataDormitoryTransaction?message=delete');
	}
	
	public function otorisasiDormitoryTransaction()
	{
		$otorisasiDormitoryTransaction = $this->model->selectdata('tbl_dormitory_transaction where state = 0 order by id_transaction ')->result_array();
		$data = array(
		'otorisasiDormitoryTransaction'	=> $otorisasiDormitoryTransaction,
			);
		//echo '<pre>'; print_r($data);exit;
		$this->load->view('pos/dormitory/header');
		$this->load->view('pos/dormitory/otorisasiDormitoryTransaction', $data);
		$this->load->view('pos/dormitory/footer');
	}
	
	public function detailTransaction($id_transaction)
	{	
		$where = array('id_transaction' => $id_transaction);
		$data['tbl_dormitory_transaction'] = $this->model->edit_data($where,'tbl_dormitory_transaction')->result();
		$this->load->view('pos/dormitory/header');
		$this->load->view('pos/dormitory/detailTransaction',$data);
		$this->load->view('pos/dormitory/footer');
	}
	
	public function actionOtorisasiDormitoryTransaction($id_transaction)
	{
		$state			= $this->input->post('state');
	 
		$data 		= array(
							'id_transaction' 		=> $id_transaction,
							'state' 				=> 1,
							);
	 
		$where = array('id_transaction' => $id_transaction);
		
		//echo '<pre>';print_r($data);exit;
		$this->model->update_data($where,$data,'tbl_dormitory_transaction');
		redirect('coba/otorisasiDormitoryTransaction?message=successfully');
	}

	public function laporanDormitoryTransaction()
	{
		$dtDormitoryApprove = $this->model->selectdata('tbl_dormitory_transaction where state = 1 order by id_transaction desc')->result_array();
		$data = array(
						'dtDormitoryApprove'	=> $dtDormitoryApprove,
						'sum'					=> $this->model->sum(),
					  );
		$this->load->view('pos/dormitory/header');
		$this->load->view('pos/dormitory/laporanDormitoryTransaction', $data);
		//$this->load->view('pos/dormitory/footer');
	}
	
	function searchDormitoryTransaction()
	{
		$dt			   = explode("-",$_POST['date-range-picker']);
		$dt1 		   = str_replace('/', '-', $dt);
		$filterSearch1 = date("Y-m-d", strtotime($dt1[0]));
		$filterSearch2 = date("Y-m-d", strtotime($dt1[1]));
		$class		   = $this->input->post('class');
		$room		   = $this->input->post('room');
		//print_r($filterSearch1);exit;
		//print_r($filterSearch2);exit;
		//print_r($class && $room);exit;
		//print_r($room);exit;
		$data 		= array('results' => $this->model->searchdate($filterSearch1,$filterSearch2,$class,$room),
							//'sum'     => $this->model->sumPrice($filterSearch1,$filterSearch2,$class,$room),
							);
		//echo '<pre>';print_r($data);exit;
		$this->load->view('pos/dormitory/header');
		$this->load->view('pos/dormitory/searchDormitoryTransaction',$data);
    }
	
	public function logout()
    {
            $array_items = array(   
                        'admin_username',
                        'admin_password' ,
                        'admin_level' ,
                        'admin_id',
                        'admin_is_logged_in'
                        );

        $this->session->unset_userdata($array_items);
         $this->session->set_flashdata('msg', 'Administrator Signed Out Now!');
            redirect('site/index');
    }
}