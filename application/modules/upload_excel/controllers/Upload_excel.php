<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Upload_excel extends Parent_Controller {
  

  var $nama_tabel = 't_file';
  var $daftar_field = array('id','user_id','file','nama_file','date_upload','approve_1','date_approve_1','approve_2','date_approve_2','approve_3','date_approve_3','approve_4','date_approve_4','approve_5','date_approve_5','approve_6','date_approve_6','approve_7','date_approve_7','approve_8','date_approve_8');
  var $primary_key = 'id';
 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_upload_excel');
 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

  
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'upload_excel/upload_excel_view';
		$this->load->view('template_view',$data);		
   
	}
 
  	public function fetch_upload_excel(){  
       $getdata = $this->m_upload_excel->fetch_upload_excel();
       echo json_encode($getdata);   
  	}  

	  public function simpan_data(){ 

		$data_form = $this->m_upload_excel->array_from_post($this->daftar_field); 
		$id = isset($data_form['id']) ? $data_form['id'] : NULL; 
	  
	 
		$simpan_data = $this->db->query("insert into t_file set user_id = '".$data_form['user_id']."', nama_file = '".$data_form['nama_file']."', file = '".$data_form['foto']."', date_upload = '".date('Y-m-d')."' ");
		$simpan_file= $this->upload_file();
	  
	 
		
			if($simpan_data && $simpan_file){
				$result = array("response"=>array('message'=>'success'));
			}else{
				$result = array("response"=>array('message'=>'failed'));
			}
			
			echo json_encode($result,TRUE);
	
		}

	public function fetch_pegawai(){  
		$getdata = $this->m_upload_excel->fetch_pegawai();
		echo json_encode($getdata);   
	}  

	function upload_file(){  
		if(isset($_FILES["user_image"])){  
			$extension = explode('.', $_FILES['user_image']['name']);   
			$destination = './upload/' . $_FILES['user_image']['name'];  
			return move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
			 
		}  
	}
	
	public function hapus_data(){
		$id = $this->uri->segment(3);  
     
		$cekfile = $this->db->where($this->primary_key,$id)->get($this->nama_tabel)->row(); 
   
		if($cekfile->file != '' || $cekfile->file != NULL){ 
          unlink("upload/".str_replace(" ","_",$cekfile->file));
		}   

		$sqlhapus = $this->m_upload_excel->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}

  	public function approve_excel_file(){  
        $id =  $this->uri->segment(3);

		//ambil dulu datanya siapa yang mau di approve berdasarkan karyawan yang upload
		$sql = $this->db->where('id',$id)->get('upload_excel')->row();
		
		//ambil file excel sesuai upload_excel yang dimaksud
		$file = file_get_contents("upload_excel/".$sql->file_excel);

		require_once dirname(__FILE__) . '/../Classes/PHPExcel/IOFactory.php';    
			$objReader = PHPExcel_IOFactory::createReader('Excel2007');
			$objReader->setReadDataOnly(true); //optional

			$objPHPExcel = $objReader->load(__DIR__.'/'.$sql->nama_file);
			$objWorksheet = $objPHPExcel->getActiveSheet();

			$i=1;
			foreach ($objWorksheet->getRowIterator() as $row) {

				$column_A_Value = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();//column A
				//you can add your own columns B, C, D etc.

				//inset $column_A_Value value in DB query here

				$i++;
			}

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
