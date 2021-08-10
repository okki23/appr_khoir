<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends Parent_Controller {
 
  	var $nama_tabel = 'user';
  	var $daftar_field = array('id','username','password','id_pegawai','level');
  	var $primary_key = 'id';

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_login');
 	}
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$this->load->view('login/login_view',$data);
	}
	public function autentikasi(){
	 
		$username = $this->input->post('username');
		$password = base64_encode($this->input->post('password'));
		  
			 
			$auth = $this->m_login->autentikasi($username,$password);
			 
			$session = $this->m_login->autentikasi($username,$password)->row();
			 
			if($auth->num_rows() > 0){
				$this->session->set_userdata(array('username'=>$session->username,'level'=>$session->level,'userid'=>$session->id));
				 

				if($session->level == '1'){
					redirect(base_url('dashboard'));
				}else{
					redirect(base_url('front'));
				}
			}else{
				echo "<script language=javascript>
				alert('Akun yang anda masukkan tidak tersedia, Periksa kembali!');
				window.location='" . base_url('login') . "';
				</script>";
			}
		 
	}

	public function logout(){
		$this->session->sess_destroy();
		echo "<script language=javascript>
             alert('Anda telah keluar dari ".$this->data['judul']." ');
             window.location='" . base_url('login') . "';
             </script>";
		 
	}
}
