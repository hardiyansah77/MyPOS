<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
//echo '<pre>'; print_r($_SESSION);exit;
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


// <<--------------------DATA KAMAR------------------------>>	
	
	public function dtKamarLengkap()
		{
			$dtKamarLengkap = $this->model->selectdata('kamar order by id')->result_array();
			$data = array(
			'dtKamarLengkap'	=> $dtKamarLengkap,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/dtKamar/dtKamarLengkap',$data);
		
		}
	
	public function formAddKamar()
		{
			$dtFloor 		= $this->model->selectfloor('floor','tbl_dormitory')->result_array();
			$dtType 		= $this->model->selectdata0('tbl_dormitory','type')->result_array();
			$dtIDkamar 		= $this->model->selectdata0('tbl_dormitory','id')->result_array();
			$data = array(
						  
						  'dtFloor'					=> $dtFloor,
						  'dtType'					=> $dtType,
						  'dtIDkamar'				=> $dtIDkamar,
						  );

			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/dtKamar/formAdd',$data);
		}

	public function actionAddKamar()
	{

		$id 				= $this->input->post('id');
		$room_number 		= $this->input->post('room_number');
		$flag				= $this->input->post('flag');
		
		$data 		= array(
							'id'			=> $id,
							'room_number' 	=> $room_number,
							'flag' 			=> 'N',
							);
					//print_r($data);
					//exit;
		$sql = $this->db->query("SELECT room_number FROM kamar where room_number='$room_number'");
		$cek_nik = $sql->num_rows();
		if ($cek_nik){
			//print_r($cek_nik);
					//exit;
		$this->session->set_flashdata('message', 'Nomor Kamar Sudah Digunakan');
		redirect('admin/formAddKamar?message=gagal');
		}else{
		$this->model->insertdata('kamar', $data);
		redirect('admin/dtKamarLengkap?message=input');
		}
	}

	public function formEditKamar($nomor)
		{
			$where = array('nomor' => $nomor);
			$data['kamar'] = $this->model->edit_data($where,'kamar')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/dtKamar/formEdit', $data);
		}

	public function updateKamar()
		{
			$nomor				= $this->input->post('nomor');
			$id 	 			= $this->input->post('id');
			$room_number 		= $this->input->post('room_number');
			$flag				= $this->input->post('flag');
		 
			$data 		= array(
								'id'				=> $id,
								'room_number' 		=> $room_number,
								'flag' 				=> $flag,
								);
		 
			$where = array('nomor' => $nomor);

			//print_r($data);
			//	exit;
		 
			$this->model->update_data($where,$data,'kamar');
			redirect('admin/dtKamarLengkap?message=update');
		}

	public function deleteKamar($nomor = '')
		{
			$deldata	= $this->model->deldata('kamar',array('nomor' => $nomor));
			redirect('admin/dtKamarLengkap?message=delete');
		}	


// <<--------------------DATA KAMAR------------------------>>


// ===============================================================================================================================



// <<--------------DATA DORMITORY TRANSACTION-------------->>	
		
	public function dtDormitoryTransaction()
		{
			$ttlMale				= $this->model->selectsum('qty_male','tbl_dormitory');
			$ttlFemale				= $this->model->selectsum('qty_female','tbl_dormitory');
			$orderMale 				= $this->model->selectcount('id_transaction','tbl_dormitory_transaction where gender = "L"');
			$orderFemale 			= $this->model->selectcount('id_transaction','tbl_dormitory_transaction where gender = "P"');
			$orderAll 				= $this->model->selectcount('id_transaction','tbl_dormitory_transaction');
			$dtDormitoryTransaction = $this->model->selectdata('tbl_dormitory_transaction WHERE state=0 order by id_transaction')->result_array();
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
			$dtKamarLengkap 		= $this->model->selectKamar()->result_array();
			$dtFloor 				= $this->model->selectfloor('floor','tbl_dormitory')->result_array();
			$data = array(
						  'dtDormitoryTransaction'		=> $dtDormitoryTransaction,
						  'dtKamarLengkap'				=> $dtKamarLengkap,
						  'dtFloor'						=> $dtFloor,
						  );
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/dtTransaksi/formAdd', $data);
		}
	
	public function actionAddDormitoryTransaction()
		{
			$jenjang 		= $this->input->post('jenjang');
			$siswa_nopin	= $this->input->post('siswa_nopin');
			$nama			= $this->input->post('nama');
			$gender			= $this->input->post('gender');
			$parent			= $this->input->post('parent');
			$class			= $this->input->post('class');
			$floor			= $this->input->post('floor');
			$type			= $this->input->post('type');
			$room_number	= $this->input->post('room_number');
			$facilities		= $this->input->post('facilities');
			$price			= $this->input->post('price');
			
			$data 			= array(
									'jenjang' 		=> $jenjang,
									'siswa_nopin' 	=> $siswa_nopin,
									'nama' 			=> $nama,
									'gender' 		=> $gender,
									'parent' 		=> $parent,
									'class' 		=> $class,
									'floor' 		=> $floor,
									'type' 			=> $type,
									'room_number' 	=> $room_number,
									'facilities'	=> $facilities,
									'price' 		=> $price,
									);
			$data1 		= array(
								'room_number' 		=> $room_number,
								'flag' 				=> Y,
								);
		 
			$where = array('room_number' => $room_number);
			
			//echo '<pre>';print_r($update_data);exit;
			$this->model->update_data($where,$data1,'kamar');
			
									//print_r($data);
						//exit;
			$this->model->insertdata('tbl_dormitory_transaction', $data);
						
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



// <<------------CHECKOUT------------->>


	public function dtCheckout()
		{
		$dtCheckout = $this->model->selectdata('tbl_dormitory_transaction where state = 1 order by id_transaction desc')->result_array();
		$data = array(
						'dtCheckout'			=> $dtCheckout,
						'sum'					=> $this->model->sum(),
					  );
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/checkout/dtCheckout', $data);
		}
		
	public function searchCheckout()
		{	
		//$dt			   = explode("-",$_POST['reservation']);
		$datepicker 		   = str_replace('/', '-', $_POST['datepicker']);
		$datepicker1 		   = str_replace('/', '-', $_POST['datepicker1']);
		$filterSearch1 = date("Y-m-d", strtotime($datepicker));
		$filterSearch2 = date("Y-m-d", strtotime($datepicker1));
		//print_r($filterSearch2);exit;
		$name		   = $this->input->post('nama');
		$class		   = $this->input->post('class');
		$room		   = $this->input->post('room');
		//print_r($filterSearch1);exit;
		//print_r($class && $room);exit;
		//print_r($class);exit;
		$data 		= array('results' => $this->model->searchdate($filterSearch1,$filterSearch2,$name,$class,$room),
							//'sum'     => $this->model->sumPrice($filterSearch1,$filterSearch2,$class,$room),
							);
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/checkout/searchCheckout', $data);
		}
		
	public function searchCheckoutcontoh()
		{	
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/checkout/searchCheckout');
		}

	public function actiondtCheckout($id_transaction,$room_number)
		{
			
			$state			= $this->input->post('state');
			$status			= $this->input->post('status');
			$data1 		= array(
								'id_transaction' 		=> $id_transaction,
								'state' 				=> 0,
								'status'				=> 1,
								);
		 
			$where1 = array('id_transaction' => $id_transaction);
			//print_r($where);exit;
			//echo '<pre>';print_r($data);exit;
			$this->model->update_data($where1,$data1,'tbl_dormitory_transaction');
			$data2 		= array(
								'room_number' 		=> $room_number,
								'flag'				=> 'N',
								);
			$where2 = array('room_number' => $room_number);
			$this->model->update_data($where2,$data2,'kamar');
			redirect('admin/dtCheckout?message=successfully');
		}

// <<------------CHECKOUT------------->>


// =============================================================================================================================



// <<------------LAPORAN DORMITORY TRANSACTION------------->>

	public function laporanDormitoryTransaction()
		{
		$dtDormitoryApprove = $this->model->selectdata('tbl_dormitory_transaction where status = 1 order by id_transaction desc')->result_array();
		$data = array(
						'dtDormitoryApprove'	=> $dtDormitoryApprove,
						'sum1'					=> $this->model->sum1(),
					  );
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/laporan/laporanDormitoryTransaction', $data);
		}
		
	public function searchDormitoryTransaction()
		{	
		//$dt			   = explode("-",$_POST['reservation']);
		$datepicker 		   = str_replace('/', '-', $_POST['datepicker']);
		$datepicker1 		   = str_replace('/', '-', $_POST['datepicker1']);
		$filterSearch1 = date("Y-m-d", strtotime($datepicker));
		$filterSearch2 = date("Y-m-d", strtotime($datepicker1));
		//print_r($filterSearch2);exit;
		$name		   = $this->input->post('nama');
		$class		   = $this->input->post('class');
		$room		   = $this->input->post('room');
		//print_r($filterSearch1);exit;
		//print_r($class && $room);exit;
		//print_r($class);exit;
		$data 		= array('results' => $this->model->searchdate($filterSearch1,$filterSearch2,$name,$class,$room),
							//'sum'     => $this->model->sumPrice($filterSearch1,$filterSearch2,$class,$room),
							);
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/laporan/searchDormitoryTransaction', $data);
		}
		
	public function searchDormitoryTransactioncontoh()
		{	
			$this->load->view('admin/header');
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

	public function actionAddKaryawan()
		{

			$nik 		= $this->input->post('nik');
			$nama		= $this->input->post('nama');
			$jk		= $this->input->post('jk');
			$ttl	= $this->input->post('ttl');
			$bagian	= $this->input->post('qty_male');
			
			$data 		= array(
								'nik' 			=> $nik,
								'nama' 			=> $nama,
								'jk' 			=> $jk,
								'ttl' 			=> $ttl,
								'bagian' 		=> $bagian,
								);
						//print_r($data);
						//exit;
			$this->model->insertdata('karyawan', $data);
			redirect('admin/dtKaryawan?message=input');
		}
		
	public function formEditKaryawan($nik)
		{
			$where = array('nik' => $nik);
			$data['karyawan'] = $this->model->edit_data($where,'karyawan')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/karyawan/formEdit', $data);
		}

	public function upadteKaryawan()
		{
			$nik 		= $this->input->post('nik');
			$nama		= $this->input->post('nama');
			$jk		= $this->input->post('jk');
			$ttl	= $this->input->post('ttl');
			$bagian	= $this->input->post('bagian');
		 
			$data 		= array(
								'nik' 			=> $nik,
								'nama' 			=> $nama,
								'jk' 			=> $jk,
								'ttl' 			=> $ttl,
								'bagian' 		=> $bagian,
								);
		 
			$where = array('nik' => $nik);
		 
			$this->model->update_data($where,$data,'karyawan');
			redirect('admin/dtKaryawan?message=update');
		}
	
	public function deleteKaryawan($nik = '')
		{
			$deldata	= $this->model->deldata('karyawan',array('nik' => $nik));
			redirect('admin/dtKaryawan?message=delete');
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

	public function actionAddBarang()
		{

			$kode_barang 		= $this->input->post('kode_barang');
			$nama_barang		= $this->input->post('nama_barang');
			$jenis_barang		= $this->input->post('jenis_barang');
			$jumlah	= $this->input->post('jumlah');
			$keterangan	= $this->input->post('keterangan');
			
			$data 		= array(
								'kode_barang' 			=> $kode_barang,
								'nama_barang' 			=> $nama_barang,
								'jenis_barang' 			=> $jenis_barang,
								'jumlah' 			=> $jumlah,
								'keterangan' 		=> $keterangan,
								);
						//print_r($data);
						//exit;
			$this->model->insertdata('barang', $data);
			redirect('admin/dtBarang?message=input');
		}
		
	public function formEditBarang($kode_barang)
		{
			$where = array('kode_barang' => $kode_barang);
			$data['barang'] = $this->model->edit_data($where,'barang')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/barang/formEdit', $data);
		}

	public function upadteBarang()
		{
			$kode_barang 		= $this->input->post('kode_barang');
			$nama_barang		= $this->input->post('nama_barang');
			$jenis_barang		= $this->input->post('jenis_barang');
			$jumlah	= $this->input->post('jumlah');
			$keterangan	= $this->input->post('keterangan');
		 
			$data 		= array(
							'kode_barang' 			=> $kode_barang,
							'nama_barang' 			=> $nama_barang,
							'jenis_barang' 			=> $jenis_barang,
							'jumlah' 			=> $jumlah,
							'keterangan' 		=> $keterangan,
								);
		 
			$where = array('kode_barang' => $kode_barang);
		 
			$this->model->update_data($where,$data,'barang');
			redirect('admin/dtBarang?message=update');
		}
	
	public function deleteBarang($kode_barang = '')
		{
			$deldata	= $this->model->deldata('barang',array('kode_barang' => $kode_barang));
			redirect('admin/dtBarang?message=delete');
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

	public function actionAddJnsBarang()
		{

			$id_jenis 		= $this->input->post('id_jenis');
			$nama_jenis		= $this->input->post('nama_jenis');
			$deskripsi		= $this->input->post('deskripsi');
			
			$data 		= array(
								'id_jenis' 			=> $id_jenis,
								'nama_jenis' 			=> $nama_jenis,
								'deskripsi' 			=> $deskripsi,
								);
						//print_r($data);
						//exit;
			$this->model->insertdata('jenis', $data);
			redirect('admin/dtJenisBarang?message=input');
		}
		
	public function formEditJnsBarang($id_jenis)
		{
			$where = array('id_jenis' => $id_jenis);
			$data['jenis'] = $this->model->edit_data($where,'jenis')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/jenisBarang/formEdit', $data);
		}

	public function upadteJnsBarang()
		{
			$id_jenis 		= $this->input->post('id_jenis');
			$nama_jenis		= $this->input->post('nama_jenis');
			$deskripsi		= $this->input->post('deskripsi');
		 
			$data 		= array(
								'id_jenis' 			=> $id_jenis,
								'nama_jenis' 			=> $nama_jenis,
								'deskripsi' 			=> $deskripsi,
								);
		 
			$where = array('id_jenis' => $id_jenis);
		 
			$this->model->update_data($where,$data,'jenis');
			redirect('admin/dtJenisBarang?message=update');
		}
	
	public function deleteJnsBarang($id_jenis = '')
		{
			$deldata	= $this->model->deldata('jenis',array('id_jenis' => $id_jenis));
			redirect('admin/dtJenisBarang?message=delete');
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

	public function actionAddLokasi()
		{

			$kode_ruang 		= $this->input->post('kode_ruang');
			$nama_ruang		= $this->input->post('nama_ruang');
			$jumlah		= $this->input->post('jumlah');
			
			$data 		= array(
								'kode_ruang' 			=> $kode_ruang,
								'nama_ruang' 			=> $nama_ruang,
								'jumlah' 			=> $jumlah,
								);
						//print_r($data);
						//exit;
			$this->model->insertdata('lokasi', $data);
			redirect('admin/dtLokasi?message=input');
		}
		
	public function formEditLokasi($kode_ruang)
		{
			$where = array('kode_ruang' => $kode_ruang);
			$data['lokasi'] = $this->model->edit_data($where,'lokasi')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/lokasi/formEdit', $data);
		}

	public function upadteLokasi()
		{
			$kode_ruang 		= $this->input->post('kode_ruang');
			$nama_ruang		= $this->input->post('nama_ruang');
			$jumlah		= $this->input->post('jumlah');
		 
			$data 		= array(
								'kode_ruang' 			=> $kode_ruang,
								'nama_ruang' 			=> $nama_ruang,
								'jumlah' 			=> $jumlah,
								);
		 
			$where = array('kode_ruang' => $kode_ruang);
		 
			$this->model->update_data($where,$data,'lokasi');
			redirect('admin/dtLokasi?message=update');
		}
	
	public function deleteLokasi($kode_ruang = '')
		{
			$deldata	= $this->model->deldata('lokasi',array('kode_ruang' => $kode_ruang));
			redirect('admin/dtLokasi?message=delete');
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

	public function actionAddTransaksiInventaris()
	{

		$nik 			= $this->input->post('nik');
		$kode_barang	= $this->input->post('kode_barang');
		$jml_barang		= $this->input->post('jml_barang');
		
		$data 		= array(
							'nik' 			=> $nik,
							'kode_barang' 	=> $kode_barang,
							'jml_barang' 	=> $jml_barang,
							);
					//print_r($data);
					//exit;
		$this->model->insertdata('transaksi', $data);
		redirect('admin/dtTransaksiPeminjaman?message=input');
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
/*======================================================================================================================

													BUS

=======================================================================================================================*/

public function dtBus()
		{
			$dtBus = $this->model->selectdata('tbl_bus')->result_array();
			$data = array(
			'dtBus'	=> $dtBus,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/bus/master/bus/dtBus', $data);
		}
		
	public function formAddBus()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/bus/master/bus/formAdd');
		}

	public function actionAddBus()
		{

			$no_stnk 		= $this->input->post('no_stnk');
			$nama_bus		= $this->input->post('nama_bus');
			$tipe_bus		= $this->input->post('tipe_bus');
			$jumlah_penumpang		= $this->input->post('jumlah_penumpang');
			$keterangan		= $this->input->post('keterangan');
			
			$data 		= array(
								'no_stnk' 				=> $no_stnk,
								'nama_bus' 				=> $nama_bus,
								'tipe_bus' 				=> $tipe_bus,
								'jumlah_penumpang' 			=> $jumlah_penumpang,
								'keterangan' 			=> $keterangan,
								);
						//print_r($data);
						//exit;
			$sql = $this->db->query("SELECT no_stnk from tbl_bus where no_stnk='$no_stnk'");
			$cek= $sql->num_rows();
			if($cek){
			$this->session->set_flashdata('message','NO STNK Sudah Ada');
			redirect('admin/dtBus?message=gagal');
			}else{
			$this->model->insertdata('tbl_bus', $data);
			redirect('admin/dtBus?message=input');
			}
		}
		
	public function formEditBus($no_stnk)
		{
			$where = array('no_stnk' => $no_stnk);
			$data['tbl_bus'] = $this->model->edit_data($where,'tbl_bus')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/bus/master/bus/formEdit', $data);
		}

	public function updateBus()
		{
			$no_stnk 				= $this->input->post('no_stnk');
			$nama_bus				= $this->input->post('nama_bus');
			$tipe_bus				= $this->input->post('tipe_bus');
			$jumlah_penumpang		= $this->input->post('jumlah_penumpang');
			$keterangan				= $this->input->post('keterangan');
		 
			$data 		= array(
								'no_stnk' 				=> $no_stnk,
								'nama_bus' 				=> $nama_bus,
								'tipe_bus' 				=> $tipe_bus,
								'jumlah_penumpang' 		=> $jumlah_penumpang,
								'keterangan' 			=> $keterangan,
								);
		 
			$where = array('no_stnk' => $no_stnk);
		 
			$this->model->update_data($where,$data,'tbl_bus');
			redirect('admin/dtBus?message=update');
		}
	
	public function deleteBus($no_stnk = '')
		{
			$deldata	= $this->model->deldata('tbl_bus',array('no_stnk' => $no_stnk));
			redirect('admin/dtBus?message=delete');
		}
/*======================================================================================================================

													BUS

=======================================================================================================================*/
/*======================================================================================================================

													HARGA BUS

=======================================================================================================================*/
	public function dtHarga()
		{
			$dtHarga = $this->model->selectdata('tbl_biaya')->result_array();
			$data = array(
			'dtHarga'	=> $dtHarga,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/bus/master/harga/dtHarga', $data);
		}
	public function formAddHarga()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/bus/master/harga/formAdd');
		}
		
	public function actionAddHarga()
	{

		$siswa 				= $this->input->post('siswa');
		$tujuan				= $this->input->post('tujuan');
		$frekuensi			= $this->input->post('frekuensi');
		$perjalanan			= $this->input->post('perjalanan');
		$harga				= $this->input->post('harga');
		
		$data 		= array(
							'siswa' 			=> $siswa,
							'tujuan' 			=> $tujuan,
							'frekuensi' 		=> $frekuensi,
							'perjalanan' 		=> $perjalanan,
							'harga' 			=> $harga,
							
							);
					//print_r($data);
					//exit;
		$this->model->insertdata('tbl_biaya', $data);
		redirect('admin/dtHarga?message=input');
	}
	public function formEditHarga($id)
		{
			$where = array('id' => $id);
			$data['tbl_biaya'] = $this->model->edit_data($where,'tbl_biaya')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/bus/master/harga/formEdit', $data);
		}
	
	public function updateHarga()
		{
			$id 	 			= $this->input->post('id');
			$siswa 				= $this->input->post('siswa');
			$tujuan				= $this->input->post('tujuan');
			$frekuensi			= $this->input->post('frekuensi');
			$perjalanan			= $this->input->post('perjalanan');
			$harga				= $this->input->post('harga');
		 
			$data 		= array(
								
							'siswa' 			=> $siswa,
							'tujuan' 			=> $tujuan,
							'frekuensi' 		=> $frekuensi,
							'perjalanan' 		=> $perjalanan,
							'harga' 			=> $harga,

								);
		 
			$where = array('id' => $id);
		 
			$this->model->update_data($where,$data,'tbl_biaya');
			redirect('admin/dtHarga?message=update');
		}
	public function deleteHarga($id = '')
		{
			$deldata	= $this->model->deldata('tbl_biaya',array('id' => $id));
			redirect('admin/dtHarga?message=delete');
		}
/*======================================================================================================================

													HARGA BUS

=======================================================================================================================*/			
/*======================================================================================================================

												TRANSAKSI BUS

=======================================================================================================================*/
public function dtTransaksiBus()
		{
			$dtTransaksiBus = $this->model->selectdata('tbl_transaksi_bus')->result_array();
			$data = array(
			'dtTransaksiBus'	=> $dtTransaksiBus,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/bus/master/transaksi/dtTransaksiBus', $data);
		}
		
	public function formAddTransaksiBus()
		{
			$dtTransaksiBus = $this->model->selectdata2('unit_name','TblUnitSekolah WHERE unit_not_active<>"Y"')->result_array();
			$dtstnk			= $this->model->selectdata0('tbl_bus','no_stnk')->result_array();
			$dtTipeBus		= $this->model->selectdata0('tbl_bus','tipe_bus')->result_array();
			$dtSiswa		= $this->model->selectsiswa('siswa','tbl_biaya')->result_array();
			$dtTujuan		= $this->model->selectsiswa('tujuan','tbl_biaya')->result_array();
			
			$data = array(
						  'dtTransaksiBus'		=> $dtTransaksiBus,
						  'dtstnk'				=> $dtstnk,
						  'dtTipeBus'			=> $dtTipeBus,
						  'dtSiswa'				=> $dtSiswa,
						  );
			$this->load->view('admin/header');
			$this->load->view('admin/bus/master/transaksi/formAdd', $data);
		}

	public function actionAddTransaksiBus()
		{

			$id_transaksi 				= $this->input->post('id_transaksi');
			$siswa_nopin				= $this->input->post('siswa_nopin');
			$siswa_nopin2				= $this->input->post('siswa_nopin2');
			$siswa_nopin3				= $this->input->post('siswa_nopin3');
			$siswa_nopin4				= $this->input->post('siswa_nopin4');
			$siswa_nopin5				= $this->input->post('siswa_nopin5');
			$jenjang 					= $this->input->post('jenjang');
			$jenjang2 					= $this->input->post('jenjang2');
			$jenjang3 					= $this->input->post('jenjang3');
			$jenjang4 					= $this->input->post('jenjang4');
			$jenjang5 					= $this->input->post('jenjang5');
			$nama 						= $this->input->post('nama');
			$nama2 						= $this->input->post('nama2');
			$nama3 						= $this->input->post('nama3');
			$nama4 						= $this->input->post('nama4');
			$nama5 						= $this->input->post('nama5');
			$parent						= $this->input->post('parent');
			$parent2					= $this->input->post('parent2');
			$parent3					= $this->input->post('parent3');
			$parent4					= $this->input->post('parent4');
			$parent5					= $this->input->post('parent5');
			$class						= $this->input->post('class');
			$class2						= $this->input->post('class2');
			$class3						= $this->input->post('class3');
			$class4						= $this->input->post('class4');
			$class5						= $this->input->post('class5');
			$tipe_bus 					= $this->input->post('tipe_bus');
			$nama_bus					= $this->input->post('nama_bus');
			
			
			$data 		= array(
								'id_transaksi' 				=> $id_transaksi,
								'siswa_nopin'				=> $siswa_nopin,
								'siswa_nopin2'				=> $siswa_nopin2,
								'siswa_nopin3'				=> $siswa_nopin3,
								'siswa_nopin4'				=> $siswa_nopin4,
								'siswa_nopin5'				=> $siswa_nopin5,
								'jenjang' 					=> $jenjang,
								'jenjang2' 					=> $jenjang2,
								'jenjang3' 					=> $jenjang3,
								'jenjang4' 					=> $jenjang4,
								'jenjang5' 					=> $jenjang5,
								'nama' 						=> $nama,
								'nama2' 					=> $nama2,
								'nama3' 					=> $nama3,
								'nama4' 					=> $nama4,
								'nama5' 					=> $nama5,
								'parent' 					=> $parent,
								'parent2' 					=> $parent2,
								'parent3' 					=> $parent3,
								'parent4' 					=> $parent4,
								'parent5' 					=> $parent5,
								'class' 					=> $class,
								'class2' 					=> $class2,
								'class3' 					=> $class3,
								'class4' 					=> $class4,
								'class5' 					=> $class5,
								'tipe_bus' 					=> $tipe_bus,
								'nama_bus' 					=> $nama_bus,
								
								);
						//print_r($data);
						//exit;
			$this->model->insertdata('tbl_transaksi_bus', $data);
			redirect('admin/dtTransaksiBus?message=input');
		}
		
	public function formTransaksiEditBus($id_transaksi)
		{
			$dtTransaksiBus = $this->model->selectdata2('unit_name','TblUnitSekolah WHERE unit_not_active<>"Y"')->result_array();
			$where = array('id_transaksi' => $id_transaksi);
			$data1['tbl_transaksi_bus'] = $this->model->edit_data($where,'tbl_transaksi_bus')->result();

			$data = array(
							'data1'						=> $data1,
							'dtTransaksiBus'			=> $dtTransaksiBus,
							
				);

			$this->load->view('admin/header');
			$this->load->view('admin/bus/master/transaksi/formEdit', $data);
		}

	public function updateTransaksiBus()
		{
			$id_transaksi 				= $this->input->post('id_transaksi');
			$siswa_nopin				= $this->input->post('siswa_nopin');
			$siswa_nopin2				= $this->input->post('siswa_nopin2');
			$siswa_nopin3				= $this->input->post('siswa_nopin3');
			$siswa_nopin4				= $this->input->post('siswa_nopin4');
			$siswa_nopin5				= $this->input->post('siswa_nopin5');
			$jenjang 					= $this->input->post('jenjang');
			$jenjang2 					= $this->input->post('jenjang2');
			$jenjang3 					= $this->input->post('jenjang3');
			$jenjang4 					= $this->input->post('jenjang4');
			$jenjang5 					= $this->input->post('jenjang5');
			$nama 						= $this->input->post('nama');
			$nama2 						= $this->input->post('nama2');
			$nama3 						= $this->input->post('nama3');
			$nama4 						= $this->input->post('nama4');
			$nama5 						= $this->input->post('nama5');
			$parent						= $this->input->post('parent');
			$parent2					= $this->input->post('parent2');
			$parent3					= $this->input->post('parent3');
			$parent4					= $this->input->post('parent4');
			$parent5					= $this->input->post('parent5');
			$class						= $this->input->post('class');
			$class2						= $this->input->post('class2');
			$class3						= $this->input->post('class3');
			$class4						= $this->input->post('class4');
			$class5						= $this->input->post('class5');
			$tipe_bus 					= $this->input->post('tipe_bus');
			$nama_bus					= $this->input->post('nama_bus');
		 
			$data 		= array(
								'siswa_nopin'				=> $siswa_nopin,
								'siswa_nopin2'				=> $siswa_nopin2,
								'siswa_nopin3'				=> $siswa_nopin3,
								'siswa_nopin4'				=> $siswa_nopin4,
								'siswa_nopin5'				=> $siswa_nopin5,
								'jenjang' 					=> $jenjang,
								'jenjang2' 					=> $jenjang2,
								'jenjang3' 					=> $jenjang3,
								'jenjang4' 					=> $jenjang4,
								'jenjang5' 					=> $jenjang5,
								'nama' 						=> $nama,
								'nama2' 					=> $nama2,
								'nama3' 					=> $nama3,
								'nama4' 					=> $nama4,
								'nama5' 					=> $nama5,
								'parent' 					=> $parent,
								'parent2' 					=> $parent2,
								'parent3' 					=> $parent3,
								'parent4' 					=> $parent4,
								'parent5' 					=> $parent5,
								'class' 					=> $class,
								'class2' 					=> $class2,
								'class3' 					=> $class3,
								'class4' 					=> $class4,
								'class5' 					=> $class5,
								'tipe_bus' 					=> $tipe_bus,
								'nama_bus' 					=> $nama_bus,
								);
		 
			$where = array('id_transaksi' => $id_transaksi);
		 
			$this->model->update_data($where,$data,'tbl_transaksi_bus');
			redirect('admin/dtTransaksiBus?message=update');
		}
	
	public function deleteTransaksiBus($id_transaksi = '')
		{
			$deldata	= $this->model->deldata('tbl_transaksi_bus',array('id_transaksi' => $id_transaksi));
			redirect('admin/dtTransaksiBus?message=delete');
		}
/*======================================================================================================================

													BUS

=======================================================================================================================*/

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
            redirect('site');
    }
}

