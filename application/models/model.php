<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {
	private $db2;
	private $table_pengembalian = 'pengembalian';
	private $table_transaksi    = 'transaksi';
	private $table_karyawan      = 'karyawan';  
    private $table_barang         = 'barang';  
	
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
	function selectdt($select = '',$where = ''){
		return $this->db->query("select $select from $where;");
	}
	function selectfloor($select = '',$where = ''){
		return $this->db->query("select distinct($select) from $where;");
	}
	function selectnik($select = '',$where = ''){
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
	function selectdata4($select = '*',$where = ''){
		return $this->db->query("select $select  from $where;");
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
		
public function AutoNumbering()   {

		  $this->db->select('RIGHT(transaksi.id_transaksi,4) as kode', FALSE);
		  $this->db->order_by('id_transaksi','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('transaksi');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }

		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "ODJ-9921-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
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
	
	function getbarang()
    {
        return $this->db->get("barang");
    }
	function pinjam($kode)
    {
        $this->db->select('jumlah');
        $this->db->from('barang');
        $this->db->where('kode_barang', $kode);
        $barang = $this->db->get()->result();
        $data = array('jumlah' => $barang[0]->jumlah-1);
       
        $this->db->where('kode_barang', $kode);
        $this->db->update('barang', $data);
    }
	 public function insertPengembalian($data)
    {
        $this->db->insert($this->table_pengembalian, $data);
    }
	function kembalikan($kode)
    {
        $this->db->select('jumlah');
        $this->db->from('barang');
        $this->db->where('kode_barang', $kode);
        $barang = $this->db->get()->result();
        $data = array('jumlah' => $barang[0]->jumlah+1);
        //var_dump($data);
        $this->db->where('kode_barang', $kode);
        $this->db->update('barang', $data);
    }
	public function update($id_transaksi, $data)
    {
        $this->db->where("id_transaksi", $id_transaksi);
        $this->db->update($this->table_transaksi, $data);
        
    }
	public function SearchNik($nik)
    {
        $data = $this->db->query("SELECT * FROM $this->table_transaksi WHERE id_transaksi 
                                  NOT IN(SELECT id_transaksi FROM $this->table_pengembalian)
                                  AND nik LIKE '%$nik%' GROUP BY nik");
        return $data;
    }

    public function SearchTransaksi($id_transaksi)
    {
        $query = $this->db->query("SELECT a.*, b.nama FROM $this->table_transaksi a, $this->table_karyawan                             b WHERE a.id_transaksi = '$id_transaksi' AND a.id_transaksi 
                                   NOT IN(SELECT c.id_transaksi FROM $this->table_pengembalian c)
                                   AND a.nik = b.nik");
        return $query;
    }

    public function showBarang($id_transaksi)
    {
        $query = $this->db->query("SELECT a.*, b.nama_barang,b.jenis_barang 
                                   FROM $this->table_transaksi a, $this->table_barang b 
                                   WHERE a.id_transaksi = '$id_transaksi' AND a.id_transaksi 
                                   NOT IN(SELECT c.id_transaksi FROM $this->table_pengembalian c)
                                   AND a.kode_barang = b.kode_barang");
        return $query;
    }
	
	 public function searchPengembalian($tanggal1, $tanggal2)
    {
        return $this->db->query("SELECT a.*, b.id_petugas, b.full_name, c.status,
                                 CASE 
                                    WHEN c.status = 'N' THEN 'Masih di pinjam'
                                 ELSE 'Sudah Dikembalikan' 
                                 END AS status_pinjam
                                 FROM pengembalian a, user b, transaksi c 
                                 WHERE a.tgl_pengembalian BETWEEN '$tanggal1' AND '$tanggal2'
                                 AND a.id_petugas = b.id_petugas AND a.id_transaksi = c.id_transaksi
                                 GROUP BY a.id_transaksi");
    }

    public function detailPengembalian($id_transaksi)
    {
        return $this->db->query("SELECT a.*, b.status, c.kode_barang, c.nama_barang, c.jenis_barang, 
                                CASE 
                                    WHEN b.status = 'N' THEN 'Masih di pinjam'
                                ELSE 'Sudah Dikembalikan' 
                                END AS status_pinjam
                                FROM pengembalian a, transaksi b, barang c
                                WHERE a.id_transaksi = '$id_transaksi'
                                AND a.id_transaksi = b.id_transaksi
                                AND b.kode_barang = c.kode_barang");
    }
	
	
	
	function searchdatee($id_transaksi, $nama) {
	$query ="select id_transaksi,nik,nama,waktu_simpan,nama_barang,kode_barang,jml_barang,date_format(tanggal_pinjam,'%d %b %Y') as 'tanggal_pinjam',date_format(tanggal_kembali,'%d %b %Y') as 'tanggal_kembali',status from transaksi";
	
	if($id_transaksi && $nama == null){
		$query .=" where id_transaksi ='".$id_transaksi."'";
	}else if($id_transaksi == null && $nama){
		$query .=" where nama ='".$nama."'";
	}else if($id_transaksi && $nama){
		$query .=" where id_transaksi ='".$id_transaksi."' and nama ='".$nama."'";
	}
	//print_r($query);exit;
	$data =  array(
					'query'	=> $this->db->query($query)->result(),
					);
	return $data;
	}
	/*
	function tanggal($id_transaksi, $nama) {
		$query ="select * from pengembalian";
	if($id_transaksi && $nama == null){
		$query .=" where id_transaksi ='".$id_transaksi."'";
	}else if($id_transaksi == null && $nama){
		$query .=" where nama ='".$nama."'";
	}else if($id_transaksi && $nama){
		$query .=" where id_transaksi ='".$id_transaksi."' and nama ='".$nama."'";
	}
	//print_r($query2);exit;
	$data =  array(
					'query'	=> $this->db->query($query)->result(),
					
					);
	return $data;
	}
	*/
function searchdate($filterSearch1, $filterSearch2, $class, $room){
	$query = "SELECT * FROM tbl_dormitory_transaction WHERE DATE_FORMAT(created_date, '%Y-%m-%d') BETWEEN DATE_FORMAT('".$filterSearch1."', '%Y-%m-%d') AND DATE_FORMAT('".$filterSearch2."', '%Y-%m-%d') and state = 1";
	$query1 = "SELECT sum(price) as price FROM tbl_dormitory_transaction WHERE DATE_FORMAT(created_date, '%Y-%m-%d') BETWEEN DATE_FORMAT('".$filterSearch1."', '%Y-%m-%d') AND DATE_FORMAT('".$filterSearch2."', '%Y-%m-%d') and state = 1";
	if($class && $room == null){
		$query .=" and class ='".$class."'";
		$query1 .=" and class ='".$class."'";
	}else if($class == null && $room){
		$query .=" and room_number ='".$room."'";
		$query1 .=" and room_number ='".$room."'";
	}else if($class && $room){
		$query .=" and class ='".$class."' and room_number ='".$room."'";
		$query1 .=" and class ='".$class."' and room_number ='".$room."'";
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

}
?>