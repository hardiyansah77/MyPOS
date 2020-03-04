<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function getNama()
		{
		$id 		= strtolower($this->input->get('id'));
		$getnama 	= $this->model->selectdata1('siswa_'.$id,'siswa_nopin, siswa_nama_lengkap')->result_array();
		$json 		=  [];
					
		foreach ($getnama as $key => $value) 
			{
				$json[$value['siswa_nopin']] = $value['siswa_nama_lengkap'];	
			}		
		echo json_encode($json);
	}
	
	public function getDt()
		{

		$id 		= strtolower($this->input->get('jenjang'));
		$nopin 		= $this->input->get('siswa_nopin');
		$getdt 		= $this->model->selectdata1('siswa_'.$id.'
														JOIN
													siswa_klapper'.$id.' ON siswa_'.$id.'.siswa_nopin = siswa_klapper'.$id.'.klapper_siswa_nopin 
													where siswa_'.$id.'.siswa_nopin = '.$nopin,
												   '
													siswa_'.$id.'.siswa_nama_lengkap,
													siswa_'.$id.'.ayah_nama_lengkap,
													siswa_'.$id.'.siswa_kelamin_id,
													siswa_klapper'.$id.'.klapper_siswa_kelas_nama
													')->result_array(); //die(json_encode($getdt));
		$json 		=  [];
					
		foreach ($getdt as $key => $value) 
			{
				$json['parent']= $value['ayah_nama_lengkap'];	
				$json['class']= $value['klapper_siswa_kelas_nama'];	
				$json['gender']= $value['siswa_kelamin_id'];	
				$json['nama']= $value['siswa_nama_lengkap'];	
			}		
		echo json_encode($json);
	}
	
	public function getRoomType()
	{
		$floor 		= $this->input->get('id');
		$getroomtype 	= $this->model->selectdata0('tbl_dormitory where floor = '.$floor,'id,type')->result_array();
		$json 			=  [];
		
		foreach ($getroomtype as $key => $value) 
			{
				$json[$value['type']] = $value['type'];	
			}	
		echo json_encode($json);
	}

	
	public function getPrice()
	{
		$type 		= $this->input->get('type');
		$getprice 	= $this->model->selectdata0('tbl_dormitory where type = "Standard A"','id,price')->result_array();
		//die(var_dump($getprice));
		$json 		=  [];
		
		foreach ($getprice as $key => $value) 
			{
				$json = $value['price'];	
			}	
		echo json_encode($json);
	}
	
	public function getDtNama()
	{
		$nama 		= $this->input->get('nama');
		$getDtNama 	= $this->model->selectdata5('karyawan where nik = '.$nama,'nama')->result_array();
		//print_r($getDtNama);exit;
		$json 		=  [];
		
		foreach ($getDtNama as $key => $value) 
			{
				$json = $value['nama'];	
			}	
		echo json_encode($json);
	}
	
	
	public function getDtBarang()
	{
		$barang 		= $this->input->get('barang');
		$getDtBarang 	= $this->model->selectdata5('barang where kode_barang = '.$barang,'nama_barang,jenis_barang,jumlah')->result_array();
		//print_r($getDtBarang);exit;
		$json 			=  [];
		foreach ($getDtBarang as $key => $value)  
			{	$json['barang']= $value['nama_barang'];	
				$json['jenis']= $value['jenis_barang'];
				$json['jumlah']= $value['jumlah'];
				//$json = $value['nama_barang'];	
				//$json = $value['jenis_barang'];	
			}	
		echo json_encode($json);
	}
	
	
	

}

	