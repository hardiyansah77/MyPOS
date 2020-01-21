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
		
	public function formEditDormitory()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/dtMasterDormitory/formEdit');
		}
		
// <<--------------------DATA DORMITORY-------------------->>	



// ===============================================================================================================================



// <<--------------DATA DORMITORY TRANSACTION-------------->>	
		
	public function dtDormitoryTransaction()
		{
			$dtDormitoryTransaction = $this->model->selectdata('tbl_dormitory_transaction order by id_transaction')->result_array();
		$data = array(
		'dtDormitoryTransaction'	=> $dtDormitoryTransaction,
			);
			$this->load->view('admin/header');
			$this->load->view('admin/dormitory/dtTransaksi/dtDormitoryTransaction',$data);
		}
		
	public function formAddDormitoryTransaction()
		{
			$this->load->view('admin/dormitory/dtTransaksi/formAdd');
		}
		
	public function formEditDormitoryTransaction()
		{
			$this->load->view('admin/dormitory/dtTransaksi/formEdit');
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
	


/*======================================================================================================================

													INVENTARIS

=======================================================================================================================*/
}
