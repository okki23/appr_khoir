<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Upload_excel extends Parent_Controller {
  

  var $nama_tabel = 't_excel_files';
  var $daftar_field = array('id','id_pegawai','file_excel','status_approval');
  var $primary_key = 'id';
 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_pegawai');
 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

  
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'pegawai/pegawai_view';
		$this->load->view('template_view',$data);		
   
	}
 
  	public function fetch_excel_file(){  
       $getdata = $this->m_pegawai->fetch_pegawai();
       echo json_encode($getdata);   
  	}  

  	public function approve_excel_file(){  
        $id =  $this->uri->segment(3);

		//ambil dulu datanya siapa yang mau di approve berdasarkan karyawan yang upload
		$sql = $this->db->where('id',$id)->get('pegawai')->row();
		
		//ambil file excel sesuai pegawai yang dimaksud
		$file = file_get_contents("upload_excel/".$sql->file_excel);

		$session_posisi = $this->session->userdata('posisi');
		$session_username = $this->session->userdata('username');
 
		if($session_posisi == 'dirut'){
			// ngeset siapa yang approve di dirut
			$spreadsheet->getActiveSheet()->setCellValue('A22', $session_username);	
		}else if($session_posisi == 'direktur'){ 
			// ngeset siapa yang approve di direktur
			$spreadsheet->getActiveSheet()->setCellValue('A23', $session_username);	
		}else if($session_posisi == 'deputi_dir'){ 
			// ngeset siapa yang approve di deputi_dir
			$spreadsheet->getActiveSheet()->setCellValue('A24', $session_username);	
		}else if($session_posisi == 'gm'){ 
			// ngeset siapa yang approve di gm
			$spreadsheet->getActiveSheet()->setCellValue('A25', $session_username);	
		}else if($session_posisi == 'manager'){ 
			// ngeset siapa yang approve di manager
			$spreadsheet->getActiveSheet()->setCellValue('A26', $session_username);	
		}else if($session_posisi == 'admin'){ 
			// ngeset siapa yang approve di admin
			$spreadsheet->getActiveSheet()->setCellValue('A27', $session_username);	
		}else if($session_posisi == 'post_jurnal'){ 
			// ngeset siapa yang approve di post_jurnal
			$spreadsheet->getActiveSheet()->setCellValue('A28', $session_username);	
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save('hello world.xlsx');

  	} 
	
    
}
