<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_login extends Parent_Model { 
  
        var $nama_tabel = 'user';
        var $daftar_field = array('id','username','password','id_pegawai','level');
        var $primary_key = 'id';
 
	public function __construct(){
        parent::__construct();
        $this->load->database();
	}
 
	public function autentikasi($username,$password){
        $sql = $this->db->query("select a.*,b.nip,b.nama from user a 
        left join pegawai b on b.id = a.id_pegawai where username = '".$username."' AND password = '".$password."' "); 
        return $sql;
	}
 
 
}
