<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {
	private $db2;

	 public function __construct()
	 {
	  parent::__construct();
			 $this->db2 = $this->load->database('data_siswa', TRUE);
	 }
	
	function validate_user($username, $password)
	{
		$this->db->where('password', $password);
		$this->db->where('username', $username);
		$query = $this->db->get('user');
		return $query->result();	
	}
	
	function validate_password($password)
	{
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		return $query->result();	
	}
		
	function get_id($username, $password)
	{
		$this->db->where('password', $password);
		$this->db->where('username', $username);	
		return $this->db->get('user')->result();		
	}
	function validate($user_id, $user_pwd)
	{
		$this->db->where('user_pwd', $user_pwd);
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('se_user');
		//echo '<pre>'; print_r($query);exit;	
		return $query->result();	
	}
		
	function get_admin($user_id, $user_pwd)
	{
		$this->db->where('user_pwd', $user_pwd);
		$this->db->where('user_id', $user_id);	
		return $this->db->get('se_user')->result();		
	}
	
	function login($table,$where){     
        return $this->db->get_where($table,$where);
    }
    function insertdata($tabel, $data){
		$tambah = $this->db->insert($tabel,$data);
		return $tambah;
	}
	function insert($tabel, $data){
		$tambah = $this->db->insert_batch($tabel,$data);
		return $tambah;
	}
	function selectdata($where = ''){
		return $this->db->query("select * from $where;");
	}
	function selectmenu($query){
		return $this->db->query($query);
	}
	function selectjoin($field = '', $join = '', $where = ''){
		return $this->db->query("select $field from $join $where;");
	}
	function selectdt(){
		return $this->db->query();
	}
	function selectfloor($select = '',$where = ''){
		return $this->db->query("select distinct($select) from $where;");
	}
	function selectsiswa($select = '',$where = ''){
		return $this->db->query("select distinct($select) from $where;");
	}
	function selectdata0($where = '',$select = '*'){
		return $this->db->query("select $select from $where;");
	}
	function selectdata1($where = '',$select = '*'){
		return $this->db2->query("select $select from $where;");
	}
	function selectdata5($where = '',$select = '*'){
		return $this->db->query("select $select from $where;");
	}
	function selectdata2($select = '*',$where = ''){
		return $this->db2->query("select $select from $where;");
	}
	function selectdata3($select = '*',$where = ''){
		return $this->db->query("select $select from $where;");
	}
	function selectcount($field = '',$where = ''){
		$query = $this->db->query("select count($field) from $where;");
		return $query->row();
	}
	function selectsum($field = '',$where = ''){
		$query = $this->db->query("select sum($field) from $where;");
		return $query->row();
	}
	function selectProgram($select = '*',$where = ''){
		return $this->db2->query("select $select from $where;");
	}	
	function updatedata($where,$table){		
	return $this->db->get_where($table,$where);
	}
	function deldata($tabel,$where){
		return $this->db->delete($tabel,$where);
	}
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	} 
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
    
	function search($keyword)
    {
        if ($keyword == NULL){
            $this->db->where('kelas','');
	}
        $this->db->where('kelas',$keyword);
        $query  =   $this->db->get('jadwal');
        return $query->result();
    }

	function searchdate($filterSearch1, $filterSearch2, $name, $class, $room){
	$query = "SELECT * FROM tbl_dormitory_transaction WHERE DATE_FORMAT(created_date, '%Y-%m-%d') BETWEEN DATE_FORMAT('".$filterSearch1."', '%Y-%m-%d') AND DATE_FORMAT('".$filterSearch2."', '%Y-%m-%d') and state = 1";
	$query1 = "SELECT sum(price) as price FROM tbl_dormitory_transaction WHERE DATE_FORMAT(created_date, '%Y-%m-%d') BETWEEN DATE_FORMAT('".$filterSearch1."', '%Y-%m-%d') AND DATE_FORMAT('".$filterSearch2."', '%Y-%m-%d') and state = 1";
	if($name == null && $class && $room == null){
		$query .=" and class ='".$class."'";
		$query1 .=" and class ='".$class."'";
	}else if($name && $class == null && $room == null){
		$query .=" and nama ='".$name."'";
		$query1 .=" and nama ='".$name."'";
	}else if($name == null && $class == null && $room){
		$query .=" and room_number ='".$room."'";
		$query1 .=" and room_number ='".$room."'";
	}else if($name && $class && $room == null){
		$query .=" and nama ='".$name."' and class ='".$class."'";
		$query1 .=" and nama ='".$name."' and class ='".$class."'";
	}else if($name && $class == null && $room ){
		$query .=" and nama ='".$name."' and room_number ='".$room."'";
		$query1 .=" and nama ='".$name."' and room_number ='".$room."'";
	}else if($name == null && $class && $room ){
		$query .=" and class ='".$class."' and room_number ='".$room."'";
		$query1 .=" and class ='".$class."' and room_number ='".$room."'";
	}else if($name && $class && $room){
		$query .=" and nama ='".$name."' and class ='".$class."' and room_number ='".$room."'";
		$query1 .=" and nama ='".$name."' and class ='".$class."' and room_number ='".$room."'";
	}else{
		$query;
		$query1;
	}
	$data =  array(
					'query'	=> $this->db->query($query)->result(),
					'query1'=> $this->db->query($query1)->result(),
				   );
	
    return $data;
    }

	
	/*function sumPrice($filterSearch1, $filterSearch2, $class, $room){
    $query = $this->db->query("SELECT sum(price) FROM tbl_dormitory_transaction WHERE DATE_FORMAT(created_date, '%Y-%m-%d') BETWEEN DATE_FORMAT('".$filterSearch1."', '%Y-%m-%d') AND DATE_FORMAT('".$filterSearch2."', '%Y-%m-%d') and state = 1");
	if($class and $room == null){
		$query .=" and class ='".$class."'";
	}else if($class == null and $room){
		$query .=" and room_number ='".$room."'";
	}else if($class and $room){
		$query .=" and class ='".$class."' and room_number ='".$room."'";
	}else{
		$query;
	}
	return $query->row();
    }*/
	
	function sum(){
    $query = $this->db->query("SELECT sum(price) FROM tbl_dormitory_transaction WHERE  state = 1");
	return $query->row();
    }
    function sum1(){
    $query = $this->db->query("SELECT sum(price) FROM tbl_dormitory_transaction WHERE  status = 1");
	return $query->row();
    }
    function selectKamar($select = '',$where = ''){
    	return $this->db->query("SELECT `room_number` FROM `kamar` WHERE `flag` = 'N'");
    }

}