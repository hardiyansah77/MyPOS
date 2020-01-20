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
//die(json_encode('haha'));
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
													')->result_array();
		$json 		=  [];
					
		foreach ($getdt as $key => $value) 
			{
				$json['parent']= $value['ayah_nama_lengkap'];	
				$json['class']= $value['klapper_siswa_kelas_nama'];	
				$json['gender']= $value['siswa_kelamin_id'];	
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
		$getprice 	= $this->model->selectdata0('tbl_dormitory where type = "Suite"','id,price')->result_array();
		$json 		=  [];
		
		foreach ($getprice as $key => $value) 
			{
				$json = $value['price'];	
			}	
		echo json_encode($json);
	}

}
