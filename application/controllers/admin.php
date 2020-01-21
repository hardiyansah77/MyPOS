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
		//$haha		   = $this->input->post('haha');print_r($haha);exit;
		$dt			   = explode("-",$_POST['reservation']);
		$dt1 		   = str_replace('/', '-', $dt);
		$filterSearch1 = date("Y-m-d", strtotime($dt1[0]));
		$filterSearch2 = date("Y-m-d", strtotime($dt1[1]));
		print_r($filterSearch2);exit;
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
			$dtDormitory = $this->model->selectdata('tbl_dormitory order by id')->result_array();
			$data = array(
			'dtDormitory'	=> $dtDormitory,
				);
			
			
			$dtKaryawan = $this->model->selectdata('karyawan')->result_array();
			$data = array(
			'dtKaryawan'	=> $dtKaryawan,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/karyawan/dtKaryawan', $data);
		}
		
	public function formAddKaryawan()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/karyawan/formAdd');
		}
		
	public function formEditKaryawan($nik)
		{
			$where = array('nik' => $nik);
			$data['karyawan'] = $this->model->edit_data($where,'karyawan')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/karyawan/formEdit', $data);
		}
		
	public function dtBarang()
		{
			$dtBarang = $this->model->selectdata('barang')->result_array();
			$data = array(
			'dtBarang'	=> $dtBarang,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/barang/dtBarang', $data);
		}
		
	public function formAddBarang()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/barang/formAdd');
		}
		
	public function formEditBarang($kode_barang)
		{
			$where = array('kode_barang' => $kode_barang);
			$data['barang'] = $this->model->edit_data($where,'barang')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/barang/formEdit', $data);
		}
		
	public function dtJenisBarang()
		{
			$dtJenisBarang = $this->model->selectdata('jenis')->result_array();
			$data = array(
			'dtJenisBarang'	=> $dtJenisBarang,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/jenisBarang/dtJenisBarang', $data);
		}
		
	public function formAddJnsBarang()
		{
			
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/jenisBarang/formAdd');
		}
		
	public function formEditJnsBarang($id_jenis)
		{
			$where = array('id_jenis' => $id_jenis);
			$data['jenis'] = $this->model->edit_data($where,'jenis')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/jenisBarang/formEdit', $data);
		}
		
	public function dtLokasi()
		{
			
			$dtLokasi = $this->model->selectdata('lokasi')->result_array();
			$data = array(
			'dtLokasi'	=> $dtLokasi,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/lokasi/dtLokasi', $data);
		}
		
	public function formAddLokasi()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/lokasi/formAdd');
		}
		
	public function formEditLokasi($kode_ruang)
		{
			$where = array('kode_ruang' => $kode_ruang);
			$data['lokasi'] = $this->model->edit_data($where,'lokasi')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/lokasi/formEdit', $data);
		}
		
	public function dtMutasi()
		{
			$dtMutasi = $this->model->selectdata('mutasi')->result_array();
			$data = array(
			'dtMutasi'	=> $dtMutasi,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/mutasi/dtMutasi', $data);
		}
		
	public function formAddMutasi()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/mutasi/formAdd');
		}
		
	public function formEditMutasi($no_mutasi)
		{
			$where = array('no_mutasi' => $no_mutasi);
			$data['mutasi'] = $this->model->edit_data($where,'mutasi')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/mutasi/formEdit', $data);
		}
		
	public function dtDepartemen()
		{
			$dtDepartemen = $this->model->selectdata('departemen')->result_array();
			$data = array(
			'dtDepartemen'	=> $dtDepartemen,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/departemen/dtDepartemen', $data);
		}
		
	public function formAddDepartemen()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/departemen/formAdd');
		}
		
	public function formEditDepartemen($id_departemen)
		{
			$where = array('id_departemen' => $id_departemen);
			$data['departemen'] = $this->model->edit_data($where,'departemen')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/departemen/formEdit', $data);
		}

	public function dtPenempatan()
		{
			$dtPenempatan = $this->model->selectdata('penempatan')->result_array();
			$data = array(
			'dtPenempatan'	=> $dtPenempatan,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/penempatan/dtPenempatan', $data);
		}
		
	public function formAddPenempatan()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/penempatan/formAdd');
		}
		
	public function formEditPenempatan($nama_barang)
		{
			$where = array('nama_barang' => $nama_barang);
			$data['penempatan'] = $this->model->edit_data($where,'penempatan')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/penempatan/formEdit', $data);
		}	
	
	public function dtPengguna()
		{
			$dtPengguna = $this->model->selectdata('user')->result_array();
			$data = array(
			'dtPengguna'	=> $dtPengguna,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/pengguna/dtPengguna', $data);
		}
		
	public function formAddPengguna()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/pengguna/formAdd');
		}
		
	public function formEditPengguna($id_petugas)
		{
			$where = array('id_petugas' => $id_petugas);
			$data['user'] = $this->model->edit_data($where,'user')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/pengguna/formEdit', $data);
		}
		
/*	public function formAddDormitoryTransaction()
		{
			$dtDormitoryTransaction = $this->model->selectdata2('unit_name','TblUnitSekolah WHERE unit_not_active<>"Y"')->result_array();
			$dtFloor 				= $this->model->selectfloor('floor','tbl_dormitory')->result_array();
			$data = array(
						  'dtDormitoryTransaction'		=> $dtDormitoryTransaction,
						  'dtFloor'						=> $dtFloor,
						  );
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/dtTransaksi/formAdd', $data);
		}*/
		
	public function dtTransaksiPeminjaman()
		{
			//$dtPengguna = $this->model->selectdata('user')->result_array();
			//$data = array(
			//'dtPengguna'	=> $dtPengguna,
			//	);
			$dtKaryawan = $this->model->selectdata3('nik','karyawan')->result_array();
			$dtBarang 	= $this->model->selectdata3('kode_barang','barang')->result_array();
			$data = array(
						  'dtKaryawan'	=> $dtKaryawan,
						  'dtBarang'	=> $dtBarang,
						  );
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/transaksi/peminjaman/peminjaman_data', $data);
		}
	
	public function laporanTransaksiInventaris()
		{
			//$dtPengguna = $this->model->selectdata('user')->result_array();
			//$data = array(
			//'dtPengguna'	=> $dtPengguna,
			//	);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/laporan/laporanTransaksiInventaris');
		}
		
	public function searchLaporanTransaksiInventaris()
		{
			//$dtPengguna = $this->model->selectdata('user')->result_array();
			//$data = array(
			//'dtPengguna'	=> $dtPengguna,
			//	);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/laporan/searchLaporanTransaksiInventaris');
		}


/*======================================================================================================================

													INVENTARIS

=======================================================================================================================*/
}
