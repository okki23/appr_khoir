<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_upload_excel extends Parent_Model { 
   
      var $nama_tabel = 't_file';
      var $daftar_field = array('id','user_id','file','nama_file','date_upload','approve_1','date_approve_1','approve_2','date_approve_2','approve_3','date_approve_3','approve_4','date_approve_4','approve_5','date_approve_5','approve_6','date_approve_6','approve_7','date_approve_7','approve_8','date_approve_8');
      var $primary_key = 'id';

	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_upload_excel(){
        if($this->session->userdata('level') == 3){
            $sql = $this->db->query("select a.*,b.nip,nama,c.nama_jabatan from t_file a
            left join pegawai b on b.id = a.user_id 
            left join jabatan c on c.id = b.id_jabatan  where a.user_id = '".$this->session->userdata('userid')."' ")->result();
        }else{
            $sql = $this->db->query('select a.*,b.nip,nama,c.nama_jabatan from t_file a
            left join pegawai b on b.id = a.user_id 
            left join jabatan c on c.id = b.id_jabatan')->result();
        }
      
		   $data = array();  
		   $no = 1;
           foreach($sql as $row)  
           {  
                $sub_array = array();  
             
                $sub_array[] = $row->nip;
                $sub_array[] = $row->nama;  
                $sub_array[] = $row->nama_file;   
                $sub_array[] = $row->date_upload;   
		    $sub_array[] = '<a href="javascript:void(0)" class="btn btn-primary btn-xs waves-effect" id="detail" onclick="Show_Detail('.$row->id.');" > <i class="material-icons">aspect_ratio</i> Detail </a> 
								&nbsp; <a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a> 
								&nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
                $sub_array[] = $row->id;
                $data[] = $sub_array;  
                 $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

    public function fetch_cat_upload_excel(){   
       $getdata = $this->db->get('m_cat_upload_excel')->result();
       $data = array();  
       $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $no;
                $sub_array[] = $row->deskripsi;   
                $sub_array[] = $row->id;   
                
                $data[] = $sub_array;  
                 $no++;
           }  
          
       return $output = array("data"=>$data);
        
    }

    public function fetch_pegawai(){   
      $getdata = $this->db->query('select a.*,b.nama_jabatan from pegawai a 
      left join jabatan b on b.id = a.id_jabatan')->result();
      $data = array();  
      $no = 1;
          foreach($getdata as $row)  
          {  
               $sub_array = array();  
               $sub_array[] = $no;
               $sub_array[] = $row->nip;   
               $sub_array[] = $row->nama;   
               $sub_array[] = $row->nama_jabatan;   
               $sub_array[] = $row->id;   
               
               $data[] = $sub_array;  
                $no++;
          }  
         
      return $output = array("data"=>$data);
       
   }

  
  
	 
 
}
