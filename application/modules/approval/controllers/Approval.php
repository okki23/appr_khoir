<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Approval extends Parent_Controller {
  

	var $nama_tabel = 't_file';
	var $daftar_field = array('id','user_id','file','nama_file','date_upload','approve_1','date_approve_1','approve_2','date_approve_2','approve_3','date_approve_3','approve_4','date_approve_4','approve_5','date_approve_5','approve_6','date_approve_6','approve_7','date_approve_7','approve_8','date_approve_8');
	var $primary_key = 'id';
 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_approval');
 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

  
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'approval/approval_view';
		$this->load->view('template_view',$data);		
   
	}
 
  	public function fetch_approval(){  
       $getdata = $this->m_approval->fetch_approval();
       echo json_encode($getdata);   
  	}  

	  public function simpan_data(){ 

		$data_form = $this->m_approval->array_from_post($this->daftar_field); 
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

	public function fetch_detail(){
		
		$id = $this->uri->segment(3);  
		$sql = $this->db->query("select a.*,b.nama as nama_pemilik,c.nama as apr1,d.nama as apr2,e.nama as apr3,f.nama as apr4,g.nama as apr5,h.nama as apr6,i.nama as apr7,j.nama as apr8 from t_file a
		left join pegawai b on b.id = a.user_id 
		left join pegawai c on c.id = a.approve_1 
		left join pegawai d on d.id = a.approve_2
		left join pegawai e on e.id = a.approve_3
		left join pegawai f on f.id = a.approve_4
		left join pegawai g on g.id = a.approve_5
		left join pegawai h on h.id = a.approve_6
		left join pegawai i on i.id = a.approve_7
		left join pegawai j on j.id = a.approve_8 where a.id = '$id' ")->row();
		echo json_encode($sql,TRUE);
	}
	public function fetch_pegawai(){  
		$getdata = $this->m_approval->fetch_pegawai();
		echo json_encode($getdata);   
	}  

	public function update_status_a(){ 
		$idapprove = $this->input->post('idapprove');
		$user = $this->input->post('user'); 

		$arr = array("approve_1"=>$user,"date_approve_1"=>date('Y-m-d'));
		$this->db->set($arr)->where("id",$idapprove)->update("t_file"); 
		 
		$datapeg = $this->db->where("id",$user)->get("pegawai")->row();
		 
		//cek file terakhir
		$cekf = $this->db->where("id",$idapprove)->get("t_file")->row();   
	 
		//ambil id data
		$data = $this->db->query("select a.*,b.nip,nama,c.nama_jabatan from t_file a
		left join pegawai b on b.id = a.user_id 
		left join jabatan c on c.id = b.id_jabatan where a.id = '".$idapprove."' ")->row();
	 
			$spreadsheet = new Spreadsheet();
			if($cekf->prev_appr_file == NULL || $cekf->prev_appr_file == ''){
				$inputFileName = 'upload/'.$data->file;
			}else{
				$inputFileName = 'signed/'.$cekf->prev_appr_file;
			}
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A22', $datapeg->nama);
			
			$writer = new Xlsx($spreadsheet);
			$writer->save('signed/signed_approved_1'.$data->file);
			$this->db->set('prev_appr_file','signed_approved_1'.$data->file)->where("id",$idapprove)->update("t_file"); 
	} 

	public function update_status_b(){ 
		$idapprove = $this->input->post('idapprove');
		$user = $this->input->post('user'); 

		$arr = array("approve_2"=>$user,"date_approve_2"=>date('Y-m-d'));
		$this->db->set($arr)->where("id",$idapprove)->update("t_file"); 
	 
		$datapeg = $this->db->where("id",$user)->get("pegawai")->row();
		
		//cek file terakhir
		$cekf = $this->db->where("id",$idapprove)->get("t_file")->row();   
		
		//ambil id datax
		$data = $this->db->query("select a.*,b.nip,nama,c.nama_jabatan from t_file a
		left join pegawai b on b.id = a.user_id 
		left join jabatan c on c.id = b.id_jabatan where a.id = '".$idapprove."' ")->row(); 
			
			$spreadsheet = new Spreadsheet();  
			if($cekf->prev_appr_file == NULL || $cekf->prev_appr_file == ''){
				$inputFileName = 'upload/'.$data->file;
			}else{
				$inputFileName = 'signed/'.$cekf->prev_appr_file;
			}
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('B22', $datapeg->nama);
			
			$writer = new Xlsx($spreadsheet);
			$writer->save('signed/signed_approved_2'.$data->file);
			$this->db->set('prev_appr_file','signed_approved_2'.$data->file)->where("id",$idapprove)->update("t_file"); 
	}

	public function update_status_c(){ 
		$idapprove = $this->input->post('idapprove');
		$user = $this->input->post('user'); 

		$arr = array("approve_3"=>$user,"date_approve_3"=>date('Y-m-d'));
		$this->db->set($arr)->where("id",$idapprove)->update("t_file"); 
	 
		$datapeg = $this->db->where("id",$user)->get("pegawai")->row();
		
		//cek file terakhir
		$cekf = $this->db->where("id",$idapprove)->get("t_file")->row();   
		
		//ambil id datax
		$data = $this->db->query("select a.*,b.nip,nama,c.nama_jabatan from t_file a
		left join pegawai b on b.id = a.user_id 
		left join jabatan c on c.id = b.id_jabatan where a.id = '".$idapprove."' ")->row(); 
			
			$spreadsheet = new Spreadsheet();  
			if($cekf->prev_appr_file == NULL || $cekf->prev_appr_file == ''){
				$inputFileName = 'upload/'.$data->file;
			}else{
				$inputFileName = 'signed/'.$cekf->prev_appr_file;
			}
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('C22', $datapeg->nama);
			
			$writer = new Xlsx($spreadsheet);
			$writer->save('signed/signed_approved_3'.$data->file);
			$this->db->set('prev_appr_file','signed_approved_3'.$data->file)->where("id",$idapprove)->update("t_file"); 
	}

	public function update_status_d(){ 
		$idapprove = $this->input->post('idapprove');
		$user = $this->input->post('user'); 

		$arr = array("approve_4"=>$user,"date_approve_4"=>date('Y-m-d'));
		$this->db->set($arr)->where("id",$idapprove)->update("t_file"); 
	 
		$datapeg = $this->db->where("id",$user)->get("pegawai")->row();
		
		//cek file terakhir
		$cekf = $this->db->where("id",$idapprove)->get("t_file")->row();   
		
		//ambil id datax
		$data = $this->db->query("select a.*,b.nip,nama,c.nama_jabatan from t_file a
		left join pegawai b on b.id = a.user_id 
		left join jabatan c on c.id = b.id_jabatan where a.id = '".$idapprove."' ")->row(); 
			
			$spreadsheet = new Spreadsheet();  
			if($cekf->prev_appr_file == NULL || $cekf->prev_appr_file == ''){
				$inputFileName = 'upload/'.$data->file;
			}else{
				$inputFileName = 'signed/'.$cekf->prev_appr_file;
			}
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('D22', $datapeg->nama);
			
			$writer = new Xlsx($spreadsheet);
			$writer->save('signed/signed_approved_4'.$data->file);
			$this->db->set('prev_appr_file','signed_approved_4'.$data->file)->where("id",$idapprove)->update("t_file"); 
	}

	public function update_status_e(){ 
		$idapprove = $this->input->post('idapprove');
		$user = $this->input->post('user'); 

		$arr = array("approve_5"=>$user,"date_approve_5"=>date('Y-m-d'));
		$this->db->set($arr)->where("id",$idapprove)->update("t_file"); 
	 
		$datapeg = $this->db->where("id",$user)->get("pegawai")->row();
		
		//cek file terakhir
		$cekf = $this->db->where("id",$idapprove)->get("t_file")->row();   
		
		//ambil id datax
		$data = $this->db->query("select a.*,b.nip,nama,c.nama_jabatan from t_file a
		left join pegawai b on b.id = a.user_id 
		left join jabatan c on c.id = b.id_jabatan where a.id = '".$idapprove."' ")->row(); 
			
			$spreadsheet = new Spreadsheet();  
			if($cekf->prev_appr_file == NULL || $cekf->prev_appr_file == ''){
				$inputFileName = 'upload/'.$data->file;
			}else{
				$inputFileName = 'signed/'.$cekf->prev_appr_file;
			}
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('E22', $datapeg->nama);
			
			$writer = new Xlsx($spreadsheet);
			$writer->save('signed/signed_approved_5'.$data->file);
			$this->db->set('prev_appr_file','signed_approved_5'.$data->file)->where("id",$idapprove)->update("t_file"); 
	}

	public function update_status_f(){ 
		$idapprove = $this->input->post('idapprove');
		$user = $this->input->post('user'); 

		$arr = array("approve_6"=>$user,"date_approve_6"=>date('Y-m-d'));
		$this->db->set($arr)->where("id",$idapprove)->update("t_file"); 
	 
		$datapeg = $this->db->where("id",$user)->get("pegawai")->row();
		
		//cek file terakhir
		$cekf = $this->db->where("id",$idapprove)->get("t_file")->row();   
		
		//ambil id datax
		$data = $this->db->query("select a.*,b.nip,nama,c.nama_jabatan from t_file a
		left join pegawai b on b.id = a.user_id 
		left join jabatan c on c.id = b.id_jabatan where a.id = '".$idapprove."' ")->row(); 
			
			$spreadsheet = new Spreadsheet();  
			if($cekf->prev_appr_file == NULL || $cekf->prev_appr_file == ''){
				$inputFileName = 'upload/'.$data->file;
			}else{
				$inputFileName = 'signed/'.$cekf->prev_appr_file;
			}
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('F22', $datapeg->nama);
			
			$writer = new Xlsx($spreadsheet);
			$writer->save('signed/signed_approved_6'.$data->file);
			$this->db->set('prev_appr_file','signed_approved_6'.$data->file)->where("id",$idapprove)->update("t_file"); 
	}

	public function update_status_g(){ 
		$idapprove = $this->input->post('idapprove');
		$user = $this->input->post('user'); 

		$arr = array("approve_7"=>$user,"date_approve_7"=>date('Y-m-d'));
		$this->db->set($arr)->where("id",$idapprove)->update("t_file"); 
	 
		$datapeg = $this->db->where("id",$user)->get("pegawai")->row();
		
		//cek file terakhir
		$cekf = $this->db->where("id",$idapprove)->get("t_file")->row();   
		
		//ambil id datax
		$data = $this->db->query("select a.*,b.nip,nama,c.nama_jabatan from t_file a
		left join pegawai b on b.id = a.user_id 
		left join jabatan c on c.id = b.id_jabatan where a.id = '".$idapprove."' ")->row(); 
			
			$spreadsheet = new Spreadsheet();  
			if($cekf->prev_appr_file == NULL || $cekf->prev_appr_file == ''){
				$inputFileName = 'upload/'.$data->file;
			}else{
				$inputFileName = 'signed/'.$cekf->prev_appr_file;
			}
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('J22', $datapeg->nama);
			
			$writer = new Xlsx($spreadsheet);
			$writer->save('signed/signed_approved_7'.$data->file);
			$this->db->set('prev_appr_file','signed_approved_7'.$data->file)->where("id",$idapprove)->update("t_file"); 
	}

	public function update_status_h(){ 
		$idapprove = $this->input->post('idapprove');
		$user = $this->input->post('user'); 

		$arr = array("approve_8"=>$user,"date_approve_8"=>date('Y-m-d'));
		$this->db->set($arr)->where("id",$idapprove)->update("t_file"); 
	 
		$datapeg = $this->db->where("id",$user)->get("pegawai")->row();
		
		//cek file terakhir
		$cekf = $this->db->where("id",$idapprove)->get("t_file")->row();   
		
		//ambil id datax
		$data = $this->db->query("select a.*,b.nip,nama,c.nama_jabatan from t_file a
		left join pegawai b on b.id = a.user_id 
		left join jabatan c on c.id = b.id_jabatan where a.id = '".$idapprove."' ")->row(); 
			
			$spreadsheet = new Spreadsheet();  
			if($cekf->prev_appr_file == NULL || $cekf->prev_appr_file == ''){
				$inputFileName = 'upload/'.$data->file;
			}else{
				$inputFileName = 'signed/'.$cekf->prev_appr_file;
			}
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('K22', $datapeg->nama);
			
			$writer = new Xlsx($spreadsheet);
			$writer->save('signed/signed_approved_8'.$data->file);
			$this->db->set('prev_appr_file','signed_approved_8'.$data->file)->where("id",$idapprove)->update("t_file"); 
	}
 
	public function update_status(){
		$approve = $this->input->post('approve');
		$idapprove = $this->input->post('idapprove');
		$user = $this->input->post('user'); 

		$datapeg = $this->db->where("id",$user)->get("pegawai")->row();

		//ambil id data
		$data = $this->db->query("select a.*,b.nip,nama,c.nama_jabatan from t_file a
		left join pegawai b on b.id = a.user_id 
		left join jabatan c on c.id = b.id_jabatan where a.id = '".$idapprove."' ")->row();
		 
		//ambil file excelnya based on id
		$inputFileName = 'upload/'.$data->file;
	
		// $spreadsheet = new Spreadsheet();
		// $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
		// $sheet = $spreadsheet->getActiveSheet();
		// $sheet->setCellValue('A22', $datapeg->nama);
		
		// $writer = new Xlsx($spreadsheet);
		// $writer->save('signed/signed_'.$data->file.'.xlsx'); 
		if($approve = 1){ 
			echo 'approve ke 1';
		}else if($approve = 2){
			echo 'approve ke 2';
		}else if($approve = 3){
			echo 'approve ke 3';
		}else if($approve = 4){
			echo 'approve ke 4';
		}else if($approve = 5){
			$arr = array("approve_5"=>$user,"date_approve_5"=>date('Y-m-d'));
			$this->db->set($arr)->where("id",$idapprove)->update("t_file"); 
			
			$spreadsheet = new Spreadsheet();
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('E22', $datapeg->nama);
			
			$writer = new Xlsx($spreadsheet);
			$writer->save('signed/signed_'.$data->file.'.xlsx');
		}else if($approve = 6){
			$arr = array("approve_6"=>$user,"date_approve_6"=>date('Y-m-d'));
			$this->db->set($arr)->where("id",$idapprove)->update("t_file"); 
			
			$spreadsheet = new Spreadsheet();
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('F22', $datapeg->nama);
			
			$writer = new Xlsx($spreadsheet);
			$writer->save('signed/signed_'.$data->file.'.xlsx');
		}else if($approve = 7){
			$arr = array("approve_7"=>$user,"date_approve_7"=>date('Y-m-d'));
			$this->db->set($arr)->where("id",$idapprove)->update("t_file");
 
			$spreadsheet = new Spreadsheet();
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('J22', $datapeg->nama);
			
			$writer = new Xlsx($spreadsheet);
			$writer->save('signed/signed_'.$data->file.'.xlsx');
		}else if($approve = 8){
			$arr = array("approve_8"=>$user,"date_approve_8"=>date('Y-m-d'));
			$this->db->set($arr)->where("id",$idapprove)->update("t_file");

			
			$spreadsheet = new Spreadsheet();
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('K22', $datapeg->nama);
			
			$writer = new Xlsx($spreadsheet);
			$writer->save('signed/signed_'.$data->file.'.xlsx');
		}
		 
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

		$sqlhapus = $this->m_approval->hapus_data($id);
		
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
