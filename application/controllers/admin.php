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
			$nama	= $this->input->post('nama');
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
									'nama' 	=> $nama,
									'gender' 		=> $gender,
									'parent' 		=> $parent,
									'class' 		=> $class,
									'floor' 		=> $floor,
									'type' 			=> $type,
									'room_number' 	=> $room_number,
									'price' 		=> $price,
									);
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



// <<------------LAPORAN DORMITORY TRANSACTION------------->>

	public function laporanDormitoryTransaction()
		{
		$dtDormitoryApprove = $this->model->selectdata('tbl_dormitory_transaction where state = 1 order by id_transaction desc')->result_array();
		$data = array(
						'dtDormitoryApprove'	=> $dtDormitoryApprove,
						'sum'					=> $this->model->sum(),
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
		$class		   = $this->input->post('class');
		$room		   = $this->input->post('room');
		//print_r($filterSearch1);exit;
		//print_r($class && $room);exit;
		//print_r($class);exit;
		$data 		= array('results' => $this->model->searchdate($filterSearch1,$filterSearch2,$class,$room),
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
			$bagian	= $this->input->post('bagian');
			
			$data 		= array(
								'nik' 			=> $nik,
								'nama' 			=> $nama,
								'jk' 			=> $jk,
								'ttl' 			=> $ttl,
								'bagian' 		=> $bagian,
								);
						//print_r($data);
						//exit;
						$sql = $this->db->query("SELECT nik from karyawan where nik='$nik'");
			$cek_nik= $sql->num_rows();
			if($cek_nik){
			$this->session->set_flashdata('message','NIK Sudah Ada');
			redirect('admin/dtKaryawan?message=gagal');
			}else{
			$this->model->insertdata('karyawan', $data);
			redirect('admin/dtKaryawan?message=input');
			}
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
			$dtLokasi 	= $this->model->selectdata3('nama_ruang','lokasi')->result_array();
			
			$data = array(
			'dtBarang'	=> $dtBarang,
			'dtLokasi' => $dtLokasi,
				);
				//print_r($data) ; exit ;
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/barang/dtBarang', $data);
		}
		
	public function formAddBarang()
		{
			$dtLokasi 	= $this->model->selectdata3('nama_ruang','lokasi')->result_array();
			
			$data = array(
			'dtLokasi'	=> $dtLokasi,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/barang/formAdd', $data);
		}

	public function actionAddBarang()
		{

			$kode_barang 		= $this->input->post('kode_barang');
			$nama_barang		= $this->input->post('nama_barang');
			$jenis_barang		= $this->input->post('jenis_barang');
			$ruang		= $this->input->post('ruang');
			$jumlah	= $this->input->post('jumlah');
			$keterangan	= $this->input->post('keterangan');
			
			$data 		= array(
								'kode_barang' 			=> $kode_barang,
								'nama_barang' 			=> $nama_barang,
								'jenis_barang' 			=> $jenis_barang,
								'ruang' 			=> $ruang,
								'jumlah' 			=> $jumlah,
								'keterangan' 		=> $keterangan,
								);
						//print_r($data);
						//exit;
			$sql = $this->db->query("SELECT kode_barang from barang where kode_barang='$kode_barang'");
			$cek_barang= $sql->num_rows();
			if($cek_barang){
			$this->session->set_flashdata('message','Kode Barang Sudah Ada');
			redirect('admin/dtBarang?message=gagal');
			}else{			
			$this->model->insertdata('barang', $data);
			redirect('admin/dtBarang?message=input');
			}
		
		}
		
	public function formEditBarang($kode_barang)
		{
			$dtLokasi 	= $this->model->selectdata3('nama_ruang','lokasi')->result_array();
			
			$data = array(
			'dtLokasi'	=> $dtLokasi,
				);
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
			$ruang		= $this->input->post('ruang');
			$jumlah	= $this->input->post('jumlah');
			$keterangan	= $this->input->post('keterangan');
		 
			$data 		= array(
							'kode_barang' 			=> $kode_barang,
							'nama_barang' 			=> $nama_barang,
							'jenis_barang' 			=> $jenis_barang,
							'ruang' 			=> $ruang,
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
			$dtBarang 	= $this->model->selectdata3('nama_barang','barang')->result_array();
			$dtLokasi 	= $this->model->selectdata3('kode_ruang','lokasi')->result_array();
			
			
			
			$data = array(
			'dtBarang'	=> $dtBarang,
			'dtMutasi'	=> $dtMutasi,
			'dtLokasi'	=> $dtLokasi,
				);
				//print_r($data) ; exit ;
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/mutasi/dtMutasi', $data);
		}
		
	public function formAddMutasi()
		{
			$dtBarang 	= $this->model->selectdata3('nama_barang','barang')->result_array();
			$dtLokasi 	= $this->model->selectdata3('kode_ruang','lokasi')->result_array();
			
			$data = array(
			'dtBarang'	=> $dtBarang,
			'dtLokasi'	=> $dtLokasi,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/mutasi/formAdd', $data);
		}
		
	public function actionAddMutasi()
	{

		$no_mutasi 			= $this->input->post('no_mutasi');
		$kd_ruang			= $this->input->post('kd_ruang');
		$nama_barang		= $this->input->post('nama_barang');
		$jumlah				= $this->input->post('jumlah');
		
		
		$data 		= array(
							'no_mutasi' 		=> $no_mutasi,
							'kd_ruang' 			=> $kd_ruang,
							'nama_barang' 		=> $nama_barang,
							'jumlah'	 		=> $jumlah,
							
							);
					//print_r($data);
					//exit;
		$this->model->insertdata('mutasi', $data);
		redirect('admin/dtMutasi?message=input');
	}
	
	public function formEditMutasi($no_mutasi)
		{
			$dtBarang 	= $this->model->selectdata3('nama_barang','barang')->result_array();
			$dtLokasi 	= $this->model->selectdata3('kode_ruang','lokasi')->result_array();
			
			$data = array(
			'dtBarang'	=> $dtBarang,
			'dtLokasi'	=> $dtLokasi,
			);
			$where = array('no_mutasi' => $no_mutasi);
			$data['mutasi'] = $this->model->edit_data($where,'mutasi')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/mutasi/formEdit', $data);
		}
		
	public function updateMutasi()
		{
		$no_mutasi 			= $this->input->post('no_mutasi');
		$kd_ruang			= $this->input->post('kd_ruang');
		$nama_barang		= $this->input->post('nama_barang');
		$jumlah				= $this->input->post('jumlah');
		 
			$data 		= array(
							'no_mutasi' 		=> $no_mutasi,
							'kd_ruang' 			=> $kd_ruang,
							'nama_barang' 		=> $nama_barang,
							'jumlah'	 		=> $jumlah,
								);
		 
			$where = array('no_mutasi' => $no_mutasi);
		 //print_r($data);exit;
			$this->model->update_data($where,$data,'mutasi');
			redirect('admin/dtMutasi?message=update');
		}
	
	public function deleteDataMutasi($no_mutasi = '')
		{
			$deldata	= $this->model->deldata('mutasi',array('no_mutasi' => $no_mutasi));
			redirect('admin/dtMutasi?message=delete');
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
		
	public function actionAddDepartemen()
	{

		$id_departemen 				= $this->input->post('id_departemen');
		$nama_departemen			= $this->input->post('nama_departemen');
		$ruang_departemen			= $this->input->post('ruang_departemen');
		
		
		$data 		= array(
							'id_departemen' 		=> $id_departemen,
							'nama_departemen' 		=> $nama_departemen,
							'ruang_departemen' 		=> $ruang_departemen,
							
							);
					//print_r($data);
					//exit;
		$this->model->insertdata('departemen', $data);
		redirect('admin/dtDepartemen?message=input');
	}
		
	public function formEditDepartemen($id_departemen)
		{
			$where = array('id_departemen' => $id_departemen);
			$data['departemen'] = $this->model->edit_data($where,'departemen')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/departemen/formEdit', $data);
		}
		
	public function updateDepartemen()
		{
		$id_departemen 				= $this->input->post('id_departemen');
		$nama_departemen			= $this->input->post('nama_departemen');
		$ruang_departemen			= $this->input->post('ruang_departemen');
		 
			$data 		= array(
							'id_departemen' 		=> $id_departemen,
							'nama_departemen' 		=> $nama_departemen,
							'ruang_departemen' 		=> $ruang_departemen,
								);
		 
			$where = array('id_departemen' => $id_departemen);
		 //print_r($data);exit;
			$this->model->update_data($where,$data,'departemen');
			redirect('admin/dtDepartemen?message=update');
		}
	
	public function deleteDataDepartemen($id_departemen = '')
		{
			$deldata	= $this->model->deldata('departemen',array('id_departemen' => $id_departemen));
			redirect('admin/dtDepartemen?message=delete');
		}



	public function dtPenempatan()
		{
			$dtPenempatan = $this->model->selectdata('penempatan')->result_array();
			$dtBarang 	= $this->model->selectdata3('nama_barang','barang')->result_array();
			$dtLokasi 	= $this->model->selectdata3('nama_ruang','lokasi')->result_array();
			$data = array(
			'dtPenempatan'	=> $dtPenempatan, $dtBarang, $dtLokasi
				);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/penempatan/dtPenempatan', $data);
		}
		
	public function formAddPenempatan()
		{
			$dtBarang 	= $this->model->selectdata3('nama_barang','barang')->result_array();
			$dtLokasi 	= $this->model->selectdata3('nama_ruang','lokasi')->result_array();
			
			$data = array(
				'dtBarang'	=> $dtBarang,
				'dtLokasi'	=> $dtLokasi,
				
				);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/penempatan/formAdd', $data);
		}
		
	public function actionAddPenempatan()
	{

		$no						= $this->input->post('no');
		$nama_barang			= $this->input->post('nama_barang');
		$nama_ruang 			= $this->input->post('nama_ruang');
		
		
		$data 		= array(
							'nama_barang' 		=> $nama_barang,
							'nama_ruang' 		=> $nama_ruang,
							);
					//print_r($data);
					//exit;
		$this->model->insertdata('penempatan', $data);
		redirect('admin/dtPenempatan?message=input');
	}
		
	public function formEditPenempatan($no)
		{
			$where = array('no' => $no);
			$data['penempatan'] = $this->model->edit_data($where,'penempatan')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/penempatan/formEdit', $data);
		}

	public function updatePenempatan()
		{
		
		$no 					= $this->input->post('no');
		$nama_barang			= $this->input->post('nama_barang');
		$nama_ruang 			= $this->input->post('nama_ruang');
		
		 
			$data 		= array(
							'nama_ruang' 		=> $nama_ruang,
							'nama_barang' 		=> $nama_barang,
								);
		 
			$where = array('no' => $no);
		 //print_r($data);
		 //exit;
			$this->model->update_data($where,$data, 'penempatan');
			redirect('admin/dtPenempatan?message=update');
		}
	
	public function deleteDataPenempatan($no = '')
		{
			$deldata	= $this->model->deldata('penempatan',array('no' => $no));
			redirect('admin/dtPenempatan?message=delete');
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
		
	public function actionAddPengguna()
	{

		$username 			= $this->input->post('username');
		$full_name			= $this->input->post('full_name');
		$password				= $this->input->post('password');
		
		
		$data 		= array(
							'username' 		=> $username,
							'full_name' 		=> $full_name,
							'password' 		=> $password,
							
							);
					//print_r($data);
					//exit;
		$this->model->insertdata('user', $data);
		redirect('admin/dtPengguna?message=input');
	}
		
	public function formEditPengguna($id_petugas)
		{
			$where = array('id_petugas' => $id_petugas);
			$data['user'] = $this->model->edit_data($where,'user')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/dtMaster/pengguna/formEdit', $data);
		}
		
	public function updatePengguna()
		{
		$id_petugas 			= $this->input->post('id_petugas');
		$username 			= $this->input->post('username');
		$full_name			= $this->input->post('full_name');
		$password				= $this->input->post('password');
		
		 
			$data 		= array(
							'username' 		=> $username,
							'full_name' 		=> $full_name,
							'password' 		=> $password,
								);
		 
			$where = array('id_petugas' => $id_petugas);
		 //print_r($data);exit;
			$this->model->update_data($where,$data,'user');
			redirect('admin/dtPengguna?message=update');
		}
	
	public function deleteDataPengguna($id_petugas = '')
		{
			$deldata	= $this->model->deldata('user',array('id_petugas' => $id_petugas));
			redirect('admin/dtPengguna?message=delete');
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
			 //$this->load->view('admin/inventaris/transaksi/peminjaman/peminjaman_data', $data);
			$dtKaryawan = $this->model->selectdata3('nik','karyawan')->result_array();
			//print_r($maxjumlahbarang) ; exit ;
			$dtBarang 	= $this->model->selectdata3('kode_barang','barang')->result_array();
			$data = array(
						  'dtKaryawan'	=> $dtKaryawan,
						  'dtBarang'	=> $dtBarang,
						  );
			$data['autonumber'] = $this->model->AutoNumbering();
			$data['tglpinjam']  = date('Y-m-d');
			$data['tglkembali'] = date('Y-m-d', strtotime('+7 day', strtotime($data['tglpinjam'])));
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/transaksi/peminjaman/peminjaman_data', $data);
		}
public function actionAddTransaksiInventaris()
	{
		date_default_timezone_set("Asia/Bangkok");
		$waktu_simpan	= date("Y-m-d H:i:s") ;
		$jumlah			= $this->input->post('jumlah');
		$jml_barang		= $this->input->post('jml_barang');
		
		if($jml_barang > $jumlah)
			
		{
			redirect('admin/dtTransaksiPeminjaman?message=gagal');
		
	    }else{
        //ambil data tmp lakukan looping . setelah looping lakukan insert ke table transaksi
      
            
            $data = array(
                'id_transaksi'     => $this->input->post('id_transaksi'),
                'nik'              => $this->input->post('nik'),
				'waktu_simpan'	=> $waktu_simpan,
				'nama' 			=>  $this->input->post('nama'),
				'nama_barang' 			=> $this->input->post('nama_barang'),
                'kode_barang'       => $this->input->post('kode_barang'),
				'jml_barang' 	=> $this->input->post('jml_barang'),
                'tanggal_pinjam'   => $this->input->post('tanggal_pinjam'),
                'tanggal_kembali'  => $this->input->post('tanggal_kembali'),
                'status'           => "N",
                
            );
           // print_r($data);
           
            //insert data ke table transaksi
            $this->model->insertdata('transaksi',$data); 

		redirect('admin/dtTransaksiPeminjaman?message=input');
            
            
           
        }
}	


	
	public function dtTransaksiPengembalian()
		{
			//$dtPengguna = $this->model->selectdata('user')->result_array();
			//$data = array(
			//'dtPengguna'	=> $dtPengguna,
			//	);
			//$dtKaryawan = $this->model->selectdata3('nik','karyawan')->result_array();
			//$sql = $this->db->query("select nik, nama, status from transaksi where status = 'N'");
			//$dtTransaksi1 = $this->model->selectdata3('kode_barang','transaksi')->result_array();
			//print_r($dtTransaksi) ; exit ;
			//$dtBarang 	= $this->model->selectdata3('kode_barang','barang')->result_array();
			
			$dtTransaksi = $this->model->selectdata3('kode_barang,id_transaksi','transaksi')->result_array();
			$dtNik = $this->model->selectnik('nik','transaksi')->result_array();
		$data = array(
						 'dtTransaksi'	=> $dtTransaksi,
						 'dtNik'	=> $dtNik,
						 
						  );
		
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/transaksi/pengembalian/pengembalian_data', $data);

		
		}
		
		
	public function simpan_transaksi()
		{
		
        $simpan = array(
            'id_transaksi'     => $this->input->post('no_transaksi'),
            'tgl_pengembalian' => date('Y-m-d'),
			 'id_petugas'     => $this->input->post('id_petugas'),
            
        );
        $this->model->insertPengembalian($simpan);

        //update status peminjaman dari N menjadi Y
        $id_transaksi = $this->input->post('id_transaksi');
        $data = array(
            'status' => "Y"
        );
      

        $this->model->update($id_transaksi, $data);	
		redirect('admin/dtTransaksiPengembalian?message=input');		
        }
		


public function cari_nik()
	{
		$nik = $this->input->post('nik');
        // $nik = 121210;
        $data['pencarian'] = $this->model->SearchNik($nik);
		
		$this->load->view('admin/inventaris/transaksi/pengembalian/pengembalian_pencarian', $data);
	}
	public function cari_transaksi()
    {
        $no_transaksi = $this->input->get_post('no_transaksi');
        // $no_transaksi = 20180411002;
        $hasil = $this->model->SearchTransaksi($no_transaksi);
        if($hasil->num_rows() > 0) {
            $dtrans = $hasil->row_array();
            echo $dtrans['nik']."|".$dtrans['tanggal_pinjam']."|".$dtrans['tanggal_kembali']."|".$dtrans['nama']."|".$dtrans['kode_barang'];
        }
    }
	public function tampil_barang()
    {
        
        $no_transaksi = $this->input->get('no_transaksi');
        $data['barang'] = $this->Mod_pengembalian->showBarang($no_transaksi)->result();
        $this->load->view('admin/pengembalian_tampil_barang', $data);
        
    }
	public function laporanTransaksiInventaris()
		{
			/*
			//$dtPengguna = $this->model->selectdata('user')->result_array();
			//$data = array(
			//'dtPengguna'	=> $dtPengguna,
			//	);
			$dtTransaksi = $this->model->selectdata('transaksi')->result_array();
			echo '<pre>'; print_r($dtTransaksi);exit;
			$data = array( 
			'dtTransaksi'	=> $dtTransaksi,
						);
			*/
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/laporan/peminjaman/laporanTransaksiInventaris');
		}
		
	public function searchLaporanTransaksiInventaris()
		{
			$id_transaksi 			= $this->input->post('id_transaksi');
			$nama			= $this->input->post('nama');
			
			//$tanggal_pinjam		= $this->input->post('tanggal_pinjam'); 
			//$tanggal_kembali		= $this->input->post('tanggal_kembali'); 
			

			//$datepicker					= str_replace('/', '-', $_POST['datepicker']);
			//$datepicker1				= str_replace('/', '-', $_POST['datepicker1']);
			//$tanggal_pinjam				= date("Y-m-d", strtotime('datepicker'));
			//$tanggal_kembali			= date("Y-m-d", strtotime('datepicker1'));
			
			//print_r($tanggal_pinjam); exit;
			$data 		= array('results' => $this->model->searchdatee($id_transaksi, $nama),
							);
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/laporan/peminjaman/searchLaporanTransaksiInventaris', $data);
		}
		
	public function laporanTransaksiPengembalian()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/laporan/pengembalian/laporanTransaksiPengembalian');
		}
	/*
	public function searchTransaksiPengembalian()
		{
			
			$id_transaksi			= $this->input->post('id_transaksi');
			$nama		= $this->input->post('nama');
			
			$data		= array('results' => $this->model->tanggal($id_transaksi, $nama),
						);
			
			$this->load->view('admin/header');
			$this->load->view('admin/inventaris/laporan/pengembalian/searchTransaksiPengembalian', $data);
		}
		*/
	public function cari_pengembalian()
    {

        $tanggal1 = $this->input->post('tanggal1');
        $tanggal2 = $this->input->post('tanggal2');
        $data['hasil_search'] = $this->model->searchPengembalian($tanggal1,$tanggal2);
        $this->load->view('admin/inventaris/laporan/pengembalian/pengembalian_search', $data);
        
    }

    public function detail_pengembalian()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $data['title']               = "Detail Pengembalian";
        $data['pengembalian']        = $this->model->detailPengembalian($id_transaksi)->row_array(); 
        $data['detailjpengembalian'] = $this->model->detailPengembalian($id_transaksi)->result();
        $this->load->view('admin/inventaris/laporan/pengembalian/pengembalian_detail', $data);

    }
		
/*======================================================================================================================

													INVENTARIS

=======================================================================================================================*/
	
/*=====================================================================================================================

												Bus Transaksi
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
		 
			$where = array('no_stnk' => $no_stnk);
		 
			$this->model->update_data($where,$data,'tbl_bus');
			redirect('admin/dtBus?message=update');
		}
	
	public function deleteBus($no_stnk = '')
		{
			$deldata	= $this->model->deldata('tbl_bus',array('no_stnk' => $no_stnk));
			redirect('admin/dtBus?message=delete');
		}
		
	/*	
		public function dtSiswa()
		{
			$dtSiswa = $this->model->selectdata('tbl_siswa')->result_array();
			$data = array(
			'dtSiswa'	=> $dtSiswa,
				);
			$this->load->view('admin/header');
			$this->load->view('admin/bus/master/siswa/dtSiswa', $data);
		}
		
	public function formAddSiswa()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/bus/master/siswa/formAdd');
		}

	public function actionAddSiswa()
		{

			$nis 				= $this->input->post('nis');
			$nama_siswa 		= $this->input->post('nama_siswa');
			$nama_orangtua 		= $this->input->post('nama_orangtua');
			$kelas 				= $this->input->post('kelas');
			$jenis_kelamin		= $this->input->post('jenis_kelamin');
			$tempat_lahir		= $this->input->post('tempat_lahir');
			$tanggal_lahir		= $this->input->post('tanggal_lahir');
			$alamat				= $this->input->post('alamat');
			
			$data 		= array(
								'nis' 				=> $nis,
								'nama_siswa' 		=> $nama_siswa,
								'nama_orangtua' 	=> $nama_orangtua,
								'kelas' 			=> $kelas,
								'jenis_kelamin' 	=> $jenis_kelamin,
								'tempat_lahir' 		=> $tempat_lahir,
								'tanggal_lahir' 	=> $tanggal_lahir,
								'alamat' 			=> $alamat,
								);
						//print_r($data);
						//exit;
			$this->model->insertdata('tbl_siswa', $data);
			redirect('admin/dtSiswa?message=input');
		}
		
	public function formEditSiswa($nis)
		{
			$where = array('nis' => $nis);
			$data['tbl_siswa'] = $this->model->edit_data($where,'tbl_siswa')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/bus/master/siswa/formEdit', $data);
		}

	public function updateSiswa()
		{
			$nis 				= $this->input->post('nis');
			$nama_siswa 		= $this->input->post('nama_siswa');
			$nama_orangtua 		= $this->input->post('nama_orangtua');
			$kelas 				= $this->input->post('kelas');
			$jenis_kelamin		= $this->input->post('jenis_kelamin');
			$tempat_lahir		= $this->input->post('tempat_lahir');
			$tanggal_lahir		= $this->input->post('tanggal_lahir');
			$alamat				= $this->input->post('alamat');
		 
			$data 		= array(
								'nis' 				=> $nis,
								'nama_siswa' 		=> $nama_siswa,
								'nama_orangtua' 	=> $nama_orangtua,
								'kelas' 			=> $kelas,
								'jenis_kelamin' 	=> $jenis_kelamin,
								'tempat_lahir' 		=> $tempat_lahir,
								'tanggal_lahir' 	=> $tanggal_lahir,
								'alamat' 			=> $alamat,
								);
		 
			$where = array('nis' => $nis);
		 
			$this->model->update_data($where,$data,'tbl_siswa');
			redirect('admin/dtSiswa?message=update');
		}
	
	public function deleteSiswa($nis = '')
		{
			$deldata	= $this->model->deldata('tbl_siswa',array('nis' => $nis));
			redirect('admin/dtSiswa?message=delete');
		}
		
	*/
	/*
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
			
			$data = array(
						  'dtTransaksiBus'		=> $dtTransaksiBus,
						 
						  );
			$this->load->view('admin/header');
			$this->load->view('admin/bus/master/transaksi/formAdd', $data);
		}

	public function actionAddTransaksiBus()
		{

			$id_transaksi 				= $this->input->post('id_transaksi');
			$nama 						= $this->input->post('nama');
			$nama2 						= $this->input->post('nama2');
			$nama3						= $this->input->post('nama3');
			$nama4 						= $this->input->post('nama4');
			$nama5 						= $this->input->post('nama5');
			$jenjang 					= $this->input->post('jenjang');
			$jenjang2 					= $this->input->post('jenjang2');
			$jenjang3 					= $this->input->post('jenjang3');
			$jenjang4					= $this->input->post('jenjang4');
			$jenjang5 					= $this->input->post('jenjang5');
			$tipe_bus 					= $this->input->post('tipe_bus');
			$nama_bus					= $this->input->post('nama_bus');
			$parent						= $this->input->post('parent');
			$parent2					= $this->input->post('parent2');
			$parent3					= $this->input->post('parent3');
			$parent4					= $this->input->post('parent4');
			$parent5					= $this->input->post('parent5');
			$class					= $this->input->post('class');
			$class2					= $this->input->post('class2');
			$class3					= $this->input->post('class3');
			$class4					= $this->input->post('class4');
			$class5					= $this->input->post('class5');
			
			
			$data 		= array(
								'id_transaksi' 				=> $id_transaksi,
								'nama' 						=> $nama,
								'nama2' 						=> $nama2,
								'nama3' 						=> $nama3,
								'nama4' 						=> $nama4,
								'nama5' 						=> $nama5,
								'jenjang' 					=> $jenjang,
								'jenjang2' 					=> $jenjang2,
								'jenjang3' 					=> $jenjang3,
								'jenjang4' 					=> $jenjang4,
								'jenjang5' 					=> $jenjang5,
								'tipe_bus' 					=> $tipe_bus,		
								'nama_bus' 					=> $nama_bus,
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
								
								);
						//print_r($data);
						//exit;
			$this->model->insertdata('tbl_transaksi_bus', $data);
			redirect('admin/dtTransaksiBus?message=input');
		}
		
	public function formTransaksiEditBus($id_transaksi)
		{
			$where = array('id_transaksi' => $id_transaksi);
			$data['tbl_transaksi_bus'] = $this->model->edit_data($where,'tbl_transaksi_bus')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/bus/master/transaksi/formEdit', $data);
		}

	public function updateTransaksiBus()
		{
			$id_transaksi 				= $this->input->post('id_transaksi');
			$nama 						= $this->input->post('nama');
			$nama2 						= $this->input->post('nama2');
			$nama3						= $this->input->post('nama3');
			$nama4 						= $this->input->post('nama4');
			$nama5 						= $this->input->post('nama5');
			$jenjang 					= $this->input->post('jenjang');
			$jenjang2 					= $this->input->post('jenjang2');
			$jenjang3 					= $this->input->post('jenjang3');
			$jenjang4					= $this->input->post('jenjang4');
			$jenjang5 					= $this->input->post('jenjang5');
			$tipe_bus 					= $this->input->post('tipe_bus');
			$nama_bus					= $this->input->post('nama_bus');
			$parent						= $this->input->post('parent');
			$parent2					= $this->input->post('parent2');
			$parent3					= $this->input->post('parent3');
			$parent4					= $this->input->post('parent4');
			$parent5					= $this->input->post('parent5');
			$class					= $this->input->post('class');
			$class2					= $this->input->post('class2');
			$class3					= $this->input->post('class3');
			$class4					= $this->input->post('class4');
			$class5					= $this->input->post('class5');
			$data 		= array(
								'id_transaksi' 				=> $id_transaksi,
								'nama' 						=> $nama,
								'nama2' 						=> $nama2,
								'nama3' 						=> $nama3,
								'nama4' 						=> $nama4,
								'nama5' 						=> $nama5,
								'jenjang' 					=> $jenjang,
								'jenjang2' 					=> $jenjang2,
								'jenjang3' 					=> $jenjang3,
								'jenjang4' 					=> $jenjang4,
								'jenjang5' 					=> $jenjang5,
								'tipe_bus' 					=> $tipe_bus,		
								'nama_bus' 					=> $nama_bus,
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
*/
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

