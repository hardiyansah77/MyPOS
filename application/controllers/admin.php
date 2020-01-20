<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
/*	public function __construct()
    {
        parent::__construct();

		if($this->session->userdata('super_admin_is_logged_in')=='')
		{
		$this->session->set_flashdata('msg','Please Login to Continue');
		redirect('site');
		}
		$this->load->model('model');
		//$this->load->model('m_cari');
    }*/

	public function index()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/dashboard');
		}
		
/*======================================================================================================================

													DORMITORY

=======================================================================================================================*/	
// <<--------------------DATA DORMITORY-------------------->>	
	
	public function dtDormitory()
		{
			$dtDormitory = $this->model->selectdata('tbl_dormitory order by id')->result_array();
		$data = array(
		'dtDormitory'	=> $dtDormitory,
			);
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/dtMasterDormitory/dtDormitory',$data);
		
		}
	public function formAddDormitory()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/dtMasterDormitory/formAdd');
		}
		
	public function actionAddDormitory()
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
					//print_r($data);
					//exit;
		$this->model->insertdata('tbl_dormitory', $data);
		redirect('admin/dtDormitory?message=input');
	}
		
	public function formEditDormitory($id)
		{
			$where = array('id' => $id);
			$data['tbl_dormitory'] = $this->model->edit_data($where,'tbl_dormitory')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/dtMasterDormitory/formEdit', $data);
		}
	
	public function upadteDormitory()
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
			redirect('admin/dtDormitory?message=update');
		}
	
	public function deleteDataDormitory($id = '')
		{
			$deldata	= $this->model->deldata('tbl_dormitory',array('id' => $id));
			redirect('admin/dtDormitory?message=delete');
		}
		
// <<--------------------DATA DORMITORY-------------------->>	



// ===============================================================================================================================



// <<--------------DATA DORMITORY TRANSACTION-------------->>	
		
	public function dtDormitoryTransaction()
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
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/dtTransaksi/dtDormitoryTransaction', $data);
		}
		
	public function formAddDormitoryTransaction()
		{
			$dtDormitoryTransaction = $this->model->selectdata2('unit_name','TblUnitSekolah WHERE unit_not_active<>"Y"')->result_array();
			$dtFloor 				= $this->model->selectfloor('floor','tbl_dormitory')->result_array();
			$data = array(
						  'dtDormitoryTransaction'		=> $dtDormitoryTransaction,
						  'dtFloor'						=> $dtFloor,
						  );
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/dtTransaksi/formAdd', $data);
		}
	
	public function actionAddDormitoryTransaction()
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
			redirect('admin/dtDormitoryTransaction?message=input');
		}
		
	public function formEditDormitoryTransaction($id_transaction)
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
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/dtTransaksi/formEdit', $data);
		}
	
	public function updateDormitoryTransaction()
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
			redirect('admin/dtDormitoryTransaction?message=update');
		}
	
	public function deleteDormitoryTransaction($id_transaction = '')
		{
			$deldata	= $this->model->deldata('tbl_dormitory_transaction',array('id_transaction' => $id_transaction));
			redirect('admin/dtDormitoryTransaction?message=delete');
		}

// <<--------------DATA DORMITORY TRANSACTION-------------->>	



// =============================================================================================================================



// <<------------LAPORAN DORMITORY TRANSACTION------------->>

	public function laporanDormitoryTransaction()
		{
			$dtDormitoryApprove = $this->model->selectdata('tbl_dormitory_transaction where state = 1 order by id_transaction desc')->result_array();
			$data = array(
						'dtDormitoryApprove'	=> $dtDormitoryApprove,
						'sum'					=> $this->model->sum(),
					  );
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/laporan/laporanDormitoryTransaction');
		}
		
	public function searchDormitoryTransaction()
		{
			$dt			   = $this->input->post('daterange-btn');
print_r($dt);exit;
			$dt1 		   = str_replace('/', '-', $dt);
			$filterSearch1 = date("Y-m-d", strtotime($dt1[0]));
			$filterSearch2 = date("Y-m-d", strtotime($dt1[1]));
			$class		   = $this->input->post('class');
			$room		   = $this->input->post('room');
			
			//print_r($filterSearch2);exit;
			//print_r($class && $room);exit;
			//print_r($room);exit;
			$data 		= array('results' => $this->model->searchdate($filterSearch1,$filterSearch2,$class,$room),
								//'sum'     => $this->model->sumPrice($filterSearch1,$filterSearch2,$class,$room),
								);
			$this->load->view('admin/dormitory/laporan/searchDormitoryTransaction');
		}

// <<------------LAPORAN DORMITORY TRANSACTION------------->>



// =============================================================================================================================



// <<-----------OTORISASI DORMITORY TRANSACTION------------>>

	public function otorisasiDormitoryTransaction()
		{
			$otorisasiDormitoryTransaction = $this->model->selectdata('tbl_dormitory_transaction where state = 0 order by id_transaction ')->result_array();
			$data = array(
			'otorisasiDormitoryTransaction'	=> $otorisasiDormitoryTransaction,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/otorisasi/otorisasiDormitoryTransaction',$data);
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
			redirect('admin/otorisasiDormitoryTransaction?message=successfully');
		}

// <<-----------OTORISASI DORMITORY TRANSACTION------------>>


/*======================================================================================================================

													DORMITORY

=======================================================================================================================*/

/*======================================================================================================================

													INVENTARIS

=======================================================================================================================*/

	public function dtKaryawan()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/karyawan/dtKaryawan');
		}
		
	public function formAddKaryawan()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/karyawan/formAdd');
		}
		
	public function formEditKaryawan()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/karyawan/formEdit');
		}
		
	public function dtBarang()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/barang/dtBarang');
		}
		
	public function formAddBarang()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/barang/formAdd');
		}
		
	public function formEditBarang()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/barang/formEdit');
		}
		
	public function dtJenisBarang()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/jenisBarang/dtJenisBarang');
		}
		
	public function formAddJnsBarang()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/jenisBarang/formAdd');
		}
		
	public function formEditJnsBarang()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/jenisBarang/formEdit');
		}
		
	public function dtLokasi()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/lokasi/dtLokasi');
		}
		
	public function formAddLokasi()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/lokasi/formAdd');
		}
		
	public function formEditLokasi()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/lokasi/formEdit');
		}
		
	public function dtMutasi()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/mutasi/dtMutasi');
		}
		
	public function formAddMutasi()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/mutasi/formAdd');
		}
		
	public function formEditMutasi()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/mutasi/formEdit');
		}
		
	public function dtDepartemen()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/departemen/dtDepartemen');
		}
		
	public function formAddDepartemen()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/departemen/formAdd');
		}
		
	public function formEditDepartemen()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/departemen/formEdit');
		}
	
		public function dtPenempatan()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/penempatan/dtPenempatan');
		}
		
	public function formAddPenempatan()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/penempatan/formAdd');
		}
		
	public function formEditPenempatan()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/penempatan/formEdit');
		}	
	public function dtPengguna()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/pengguna/dtPengguna');
		}
		
	public function formAddPengguna()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/pengguna/formAdd');
		}
		
	public function formEditPengguna()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/pengguna/formEdit');
		}


/*======================================================================================================================

													INVENTARIS

=======================================================================================================================*/
}
