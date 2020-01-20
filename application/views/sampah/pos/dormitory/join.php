<?php
public function dataDormitoryTransaction()
	{
		$ttlMale				= $this->model->selectsum('qty_male','tbl_dormitory');
		$ttlFemale				= $this->model->selectsum('qty_female','tbl_dormitory');
		$orderMale 				= $this->model->selectcount('id_transaction','tbl_dormitory_transaction where gender = "L"');
		$orderFemale 			= $this->model->selectcount('id_transaction','tbl_dormitory_transaction where gender = "P"');
		$orderAll 				= $this->model->selectcount('id_transaction','tbl_dormitory_transaction');
		$dtDormitoryTransaction = $this->model->selectjoin('einfo_smsdemo.siswa_smp.siswa_nama_lengkap,
															einfo_tradingdemo.tbl_dormitory_transaction.id_transaction,
															einfo_tradingdemo.tbl_dormitory_transaction.parent,
															einfo_tradingdemo.tbl_dormitory_transaction.class,
															einfo_tradingdemo.tbl_dormitory_transaction.type,
															einfo_tradingdemo.tbl_dormitory_transaction.floor,
															einfo_tradingdemo.tbl_dormitory_transaction.room_number,
															einfo_tradingdemo.tbl_dormitory_transaction.price',
															'einfo_tradingdemo.tbl_dormitory_transaction',
															'join einfo_smsdemo.siswa_smp on 
															einfo_smsdemo.siswa_smp.siswa_nopin = einfo_tradingdemo.tbl_dormitory_transaction.siswa_nopin 
															order by id_transaction')->result_array();
		$data = array(
		'ttlMale'					=> $ttlMale,
		'ttlFemale'					=> $ttlFemale,
		'orderMale'					=> $orderMale,
		'orderFemale'				=> $orderFemale,
		'orderAll'					=> $orderAll,
		'dtDormitoryTransaction'	=> $dtDormitoryTransaction,
			);
		//echo '<pre>'; print_r($dtDormitoryTransaction);exit;
		$this->load->view('pos/dormitory/header');
		$this->load->view('pos/dormitory/dataDormitoryTransaction', $data);
		$this->load->view('pos/dormitory/footer');
	}
?>	