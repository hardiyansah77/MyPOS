<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
    {
        parent::__construct();

		if($this->session->userdata('user_is_logged_in')=='')
		{
		$this->session->set_flashdata('msg','Please Login to Continue');
		redirect('site');
		}
		$this->load->model('model');
		$this->load->model('m_cari');
    }
		
	public function index()
	{
		$berita = $this->model->selectdata('berita order by id_berita desc limit 10')->result_array();
		$id= $_SESSION['user_id'];
		$data_user = $this->model->selectdata('user where id_user ="'.$id.'"')->result_array();
		$data = array(
						'berita'		=> $berita,
						'data_user'		=> $data_user,
		
			);
		$this->load->view('user/index', $data);
	}
	
	public function berita($id_berita)
	{
		
		$id= $_SESSION['user_id'];
		$data_user = $this->model->selectdata('user where id_user ="'.$id.'"')->result_array();
		$data = array(
						'data_user'		=> $data_user,);
						$where = array('id_berita' => $id_berita);
		$data['berita'] = $this->model->edit_data($where,'berita')->result();
		
		$this->load->view('user/berita', $data);
	}
	
	public function bio_foto($id_user)
	{
		$id= $_SESSION['user_id'];
		$data_user = $this->model->selectdata('user where id_user ="'.$id.'"')->result_array();
		$data = array(
						'data_user'		=> $data_user,);
		$where = array('id_user' => $id_user);
		$data['user'] = $this->model->edit_data($where,'user')->result();
		

		$this->load->view('user/bio_foto', $data);
	}
	
	public function bio_fotoo()
	{
		$id= $_SESSION['user_id'];
		$data_user = $this->model->selectdata('user where id_user ="'.$id.'"')->result_array();
		$data = array(
						'data_user'		=> $data_user,);

		$this->load->view('user/bio_fotoo', $data);
	}
	
	function aksi_bio(){    
		$data = array();        
			if($this->input->post('submit')){         
				$upload = $this->model->upload();           
			if($upload['result'] == "success"){                 
				$this->model->save_update($upload);                

	  redirect('user/bio_fotoo', $data);  
	  
	  }   
}      
	  $this->load->view('user/bio_foto',$data);  
	  }
	  
	public function akademik()
	{
			$id= $_SESSION['user_id'];
			$nama= $_SESSION['nama'];
			$data_user = $this->model->selectdata('user where id_user ="'.$id.'"')->result_array();
			$data_utama = $this->model->selectdata('nilai where nm_siswa ="'.$nama.'" and jenis=1 order by semester, nm_matkul ASC')->result_array();
			$data_lokal = $this->model->selectdata('nilai where nm_siswa ="'.$nama.'" and jenis=2 order by semester, nm_matkul ASC')->result_array();
			$data_rangkuman = $this->model->selectdata('nilai where nm_siswa ="'.$nama.'" order by semester, nm_matkul ASC')->result_array();
			$data = array(
				'data_user'		=> $data_user,
				'data_utama'		=> $data_utama,
				'data_lokal'		=> $data_lokal,
				'data_rangkuman'		=> $data_rangkuman,
			);
			//print_r($data);
			//exit;
		$this->load->view('user/akademik', $data);
	}
	public function sidang()
	{
		$this->load->view('user/sidang');
	}
	public function Surat_keterangan()
	{
		$npm= $_SESSION['npm'];
		$data_surket = $this->model->selectdata('surket where npm ="'.$npm.'"')->result_array();
		$id= $_SESSION['user_id'];
		$data_user = $this->model->selectdata('user where id_user ="'.$id.'"')->result_array();
		$data = array(
		'data_surket'		=> $data_surket,
		'data_user'			=> $data_user,
			);
		$this->load->view('user/Surat_keterangan', $data);
	}
	public function form_surket()
	{
		$id= $_SESSION['user_id'];
		$data_user = $this->model->selectdata('user where id_user ="'.$id.'"')->result_array();
		$data = array(
						'data_user'		=> $data_user,
		
			);
		$this->load->view('user/form_surket', $data);
	}
	
	Public function aksi_surket()
    {
		$npm	= $this->input->post('npm');
		$nama 	= $this->input->post('nama');
		$tmp_lahir		= $this->input->post('tmp_lahir');
		$tgl_lahir		= $this->input->post('tgl_lahir');
		$fakultas		= $this->input->post('fakultas');
		$jurusan		= $this->input->post('jurusan');
		$semester		= $this->input->post('semester');
		$no_hp		= $this->input->post('no_hp');
		$alamat		= $this->input->post('alamat');
		$jns_surat		= $this->input->post('jns_surat');
		$lokasi		= $this->input->post('lokasi');
		$waktu		= $this->input->post('waktu');
		
		$data 			= array(
								'npm' 		=> $npm,
								'nama' 		=> $nama,
								'tmp_lahir' 			=> $tmp_lahir,
								'tgl_lahir' 		=> $tgl_lahir,
								'fakultas' 		=> $fakultas,
								'jurusan' 		=> $jurusan,
								'semester' 		=> $semester,
								'no_hp' 		=> $no_hp,
								'alamat' 		=> $alamat,
								'jns_surat' 		=> $jns_surat,
								'lokasi' 		=> $lokasi,
								'waktu' 		=> date("Y-m-d", now()),
								);
		$this->model->insertdata('surket', $data);
		redirect('user/Surat_keterangan');
	}
	public function penulisan()
	{
		$npm= $_SESSION['npm'];
		$data_penulisan = $this->model->selectdata('penulisan where npm ="'.$npm.'"')->result_array();
		$id= $_SESSION['user_id'];
		$data_user = $this->model->selectdata('user where id_user ="'.$id.'"')->result_array();
		$data = array(
		'data_penulisan'		=> $data_penulisan,
		'data_user'				=> $data_user,
			);
		$this->load->view('user/penulisan', $data);
	}
	public function form_pnlsn()
	{
		$id= $_SESSION['user_id'];
			$data_user = $this->model->selectdata('user where id_user ="'.$id.'"')->result_array();
			$data = array(
			'data_user'		=> $data_user,
			);
		$this->load->view('user/form_pnlsn', $data);
	}
	Public function aksi_pnlsn()
    {
		$nama	= $this->input->post('nama');
		$npm	= $this->input->post('npm');
		$title 	= $this->input->post('title');
		$url	= $this->input->post('url');
		$waktu	= $this->input->post('waktu');

		
		$data 			= array(
								'nama' 		=> $this->session->userdata('nama'),
								'npm' 		=>  $npm,
								'title' 	=> $title,
								'url' 		=> $url,
								'waktu' 	=> date("Y-m-d", now()),
								);
		$this->model->insertdata('penulisan', $data);
		redirect('user/penulisan');
	}
	public function edit_pnlsn()
	{
		$this->load->view('user/edit_pnlsn');
	}
	public function tugas()
	{
		$npm= $_SESSION['npm'];
		$data_tugas = $this->model->selectdata('tugas where npm ="'.$npm.'"')->result_array();
		$id= $_SESSION['user_id'];
		$data_user = $this->model->selectdata('user where id_user ="'.$id.'"')->result_array();
		$data = array(
		'data_tugas'		=> $data_tugas,
		'data_user'			=> $data_user,
			);
		$this->load->view('user/tugas', $data);
	}
	public function form_tgs()
	{
		$id= $_SESSION['user_id'];
			$data_user = $this->model->selectdata('user where id_user ="'.$id.'"')->result_array();
			$data = array(
			'data_user'		=> $data_user,
			);
		$this->load->view('user/form_tgs', $data);
	}
	Public function aksi_tugas()
    {
		$nama	= $this->input->post('nama');
		$npm	= $this->input->post('npm');
		$title 	= $this->input->post('title');
		$url	= $this->input->post('url');
		$matkul	= $this->input->post('matkul');
		$waktu	= $this->input->post('waktu');

		
		$data 			= array(
								'nama' 		=> $this->session->userdata('nama'),
								'npm' 		=>  $npm,
								'title' 	=> $title,
								'url' 		=> $url,
								'matkul' 		=> $matkul,
								'waktu' 	=> date("Y-m-d", now()),
								);
		$this->model->insertdata('tugas', $data);
		redirect('user/tugas');
	}
	public function edit_tgs()
	{
		$this->load->view('user/edit_tgs');
	}
	public function ganti_password()
	{
		$id= $_SESSION['user_id'];
		$data_user = $this->model->selectdata('user where id_user ="'.$id.'"')->result_array();
		$data = array(
			'data_user'		=> $data_user,
			);
		$this->load->view('user/ganti_password', $data);
	}
public function logout()
    {
            $array_items = array(   
		
                        'user_name',
                        'user_password' ,
                        'user_id',
                        'user_is_logged_in'
                        );
						
						//print_r($array_items);
				//exit;

        $this->session->unset_userdata($array_items);
         $this->session->set_flashdata('msg', 'Staff Signed Out Now!');
            redirect('site');
    }
}