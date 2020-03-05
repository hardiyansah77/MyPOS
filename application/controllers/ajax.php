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

	public function getNama2()
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
		$getDtBarang 	= $this->model->selectdata5('barang where kode_barang = '.$barang,'nama_barang,jenis_barang')->result_array();
		//print_r($getDtBarang);exit;
		$json 			=  [];
		foreach ($getDtBarang as $key => $value)  
			{	$json['barang']= $value['nama_barang'];	
				$json['jenis']= $value['jenis_barang'];
				//$json = $value['nama_barang'];	
				//$json = $value['jenis_barang'];	
			}	
		echo json_encode($json);
	}
	public function CeKkamar()
	{
		$room_number 		= $this->input->get('room_number');
		/*$getDtkamar 	= $this->model->selectdata5('SELECT tbl_dormitory.floor, tbl_dormitory.type, tbl_dormitory.price, kamar.flag 
													FROM tbl_dormitory JOIN kamar ON tbl_dormitory.id = kamar.id 
													WHERE kamar.room_number ='.$room_number)->result_array();*/
		$getDtkamar		= $this->model->selectdata5('tbl_dormitory join kamar ON tbl_dormitory.id = kamar.id where kamar.room_number = '.$room_number,
													'tbl_dormitory.floor, tbl_dormitory.type, tbl_dormitory.price, tbl_dormitory.facilities, kamar.flag')->result_array(); 
		//$getDtkamar 	= $this->model->selectdata5('barang where kode_barang = '.$barang,'nama_barang,jenis_barang')->result_array();
		//print_r($getDtBarang);exit;
		$json 			=  [];
		foreach ($getDtkamar as $key => $value)  
			{	
				$json['floor']= $value['floor'];	
				$json['type']= $value['type'];
				$json['facilities']= $value['facilities'];
				$json['price']= $value['price'];	
			}	
		echo json_encode($json);
	}
	public function getFloor1()
	{
		$floor 		= $this->input->get('floor');
		$getFloor 	= $this->model->selectdata5('tbl_dormitory where floor = '.$floor,'type,id')->result_array();
		//echo '<pre>';print_r($getFloor);exit;
		$json 	= [];
		foreach ($getFloor as $key => $value) 
		{
			$json['type']= $value['type'];
			$json['id']= $value['id'];
			
		}
		echo json_encode($json);
	}

	public function getFloor()
		{
		$floor 		= $this->input->get('floor');
		$getType 	= $this->model->selectdata5('tbl_dormitory where floor = '.$floor,'type, id')->result_array();
		//echo '<pre>';print_r($getType);exit;
		$json 		=  [];
					
		foreach ($getType as $key => $value) 
			{
				$json[$value['id']] = $value['type'];	
			}		
		echo json_encode($json);
	}

	
	
	public function getDt2()
		{

		$id 		= strtolower($this->input->get('jenjang2'));
		$nopin 		= $this->input->get('siswa_nopin');
		$getdt2 	= $this->model->selectdata1('siswa_'.$id.'
														JOIN
													siswa_klapper'.$id.' ON siswa_'.$id.'.siswa_nopin = siswa_klapper'.$id.'.klapper_siswa_nopin 
													where siswa_'.$id.'.siswa_nopin = '.$nopin,
												   '
													siswa_'.$id.'.siswa_nama_lengkap,
													siswa_'.$id.'.ayah_nama_lengkap,
													siswa_'.$id.'.siswa_kelamin_id,
													siswa_klapper'.$id.'.klapper_siswa_kelas_nama
													')->result_array(); //die(json_encode($getdt));
		$json2		=  [];
					
		foreach ($getdt2 as $key => $value) 
			{
				$json['parent2']= $value['ayah_nama_lengkap'];	
				$json['class2']= $value['klapper_siswa_kelas_nama'];	
				$json['gender']= $value['siswa_kelamin_id'];	
				$json['nama2']= $value['siswa_nama_lengkap'];	
			}		
		echo json_encode($json);
	}

	public function getStnk()
	{
		$no_stnk 		= $this->input->get('no_stnk');
		$getBus			= $this->model->selectdata0('tbl_bus where no_stnk = '.$no_stnk,'tipe_bus,nama_bus')->result_array();
		//echo '<pre>';print_r($getBus);exit;
		$json 		=  [];
					
		foreach ($getBus as $key => $value) 
			{
				$json['tipe_bus'] = $value['tipe_bus'];
				$json['nama_bus'] = $value['nama_bus'];
					
			}	
			//die(json_encode($value));	
		echo json_encode($json);
	}

	
	public function getTujuan()
		{
		$siswa 				= $this->input->get('siswa');
		$getDtTujuan		= $this->model->selectdata5('tbl_biaya where siswa = '.$siswa,'tujuan')->result_array();
														//SELECT `tujuan` FROM `tbl_biaya` WHERE `siswa` = '1SISWA'
		//echo '<pre>';print_r($getType);exit;
		$json 		=  [];
					
		foreach ($getDtTujuan as $key => $value) 
			{
				$json['tujuan'] = $value['tujuan'];
					
			}		
		echo json_encode($json);
	}

	/*
	public function getBiaya()
	{
		$siswa 			= $this->input->get('siswa');
		$getDtbiaya		= $this->model->selectdata0('tbl_biaya where siswa = '.$siswa,'tujuan,frekuensi,perjalanan,harga')->result_array();
		$json 			=  [];
		foreach ($getDtbiaya as $key => $value)  
			{	
				$json['tujuan']= $value['tujuan'];	
				$json['frekuensi']= $value['frekuensi'];
				$json['perjalanan']= $value['perjalanan'];
				$json['harga']= $value['harga'];	
			}	
		echo json_encode($json);
	}

	
	public function getNamaBus()
	{
		$tipe_bus 		= $this->input->get('tipe_bus');
		$getnama_bus 	= $this->model->selectdata5('tbl_bus where tipe_bus = '.$tipe_bus,'id,nama_bus')->result_array();
		//die(var_dump($getprice));
		$json 		=  [];
		
		foreach ($getnama_bus as $key => $value) 
			{
				$json [$value['nama_bus']] = $value['nama_bus'];	
			}	
		echo json_encode($json);
	}
	*/


}
