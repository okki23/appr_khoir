<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_approval extends Parent_Model { 
   
      var $nama_tabel = 't_file';
      var $daftar_field = array('id','user_id','file','nama_file','date_upload','approve_1','date_approve_1','approve_2','date_approve_2','approve_3','date_approve_3','approve_4','date_approve_4','approve_5','date_approve_5','approve_6','date_approve_6','approve_7','date_approve_7','approve_8','date_approve_8');
      var $primary_key = 'id';

	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_approval(){
        $sql = $this->db->query("select a.*,b.nip,b.nama as nama_pemilik,c.nama as apr1,d.nama as apr2,e.nama as apr3,f.nama as apr4,g.nama as apr5,h.nama as apr6,i.nama as apr7,j.nama as apr8 from t_file a
        left join pegawai b on b.id = a.user_id 
        left join pegawai c on c.id = a.approve_1 
        left join pegawai d on d.id = a.approve_2
        left join pegawai e on e.id = a.approve_3
        left join pegawai f on f.id = a.approve_4
        left join pegawai g on g.id = a.approve_5
        left join pegawai h on h.id = a.approve_6
        left join pegawai i on i.id = a.approve_7
        left join pegawai j on j.id = a.approve_8
        ")->result();
      
		   $data = array();  
		   $no = 1;
           foreach($sql as $row)  
           {  
                $sub_array = array();  
             
                $sub_array[] = $row->nip;
                $sub_array[] = $row->nama_pemilik;  
                $sub_array[] = $row->nama_file;   
                $sub_array[] = $row->date_upload;   
		        $sub_array[] = '<a href="javascript:void(0)" id="delete" class="btn btn-info btn-xs waves-effect" onclick="Show_Detail('.$row->id.');" > <i class="material-icons">aspect_ratio</i> Detail </a> &nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-success btn-xs waves-effect" onclick="Approve('.$row->id.');" > <i class="material-icons">checklist</i> Approve </a>';  
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
;