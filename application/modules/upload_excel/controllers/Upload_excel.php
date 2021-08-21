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

		$simpan_data = $this->db->query("insert into t_file set user_id = '".$data_form['user_id']."', nama_file = '".$data_form['nama_file']."', file = '".$_FILES['user_image']['name']."', date_upload = '".date('Y-m-d')."' ");
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

		//ambil id data
		$data = $this->db->query("select a.*,b.nip,nama,c.nama_jabatan from t_file a
		left join pegawai b on b.id = a.user_id 
		left join jabatan c on c.id = b.id_jabatan where a.id = '".$id."' ")->row();
		 
		//ambil file excelnya based on id
		$inputFileName = 'upload/'.$data->file;

		/** Load $inputFileName to a Spreadsheet Object  **/
		
		$spreadsheet = new Spreadsheet();
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A22', 'Di Approve ...Monicrot!');
		
		$writer = new Xlsx($spreadsheet);
		$writer->save('signed/udahttd.xlsx');
 
		 
  	} 


	
    
}
