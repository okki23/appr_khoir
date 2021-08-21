f 
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                 
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Upload Excel
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
									<thead>
										<tr>    
											<th style="width:5%;">NIP</th>
                                            <th style="width:10%;">Nama</th>  
											<th style="width:10%;">Filename</th>  
                                            <th style="width:10%;">Date Upload</th>  
											<th style="width:10%;">Opsi</th> 
										</tr>
									</thead> 
								</table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
    </section>

   
	<!-- form tambah dan ubah data -->
	<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                                 <input type="hidden" name="id" id="id"> 
                                 <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama" id="nama" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="user_id" id="user_id" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="PilihPegawai();" class="btn btn-primary"> Pilih Pegawai... </button>
                                                </span>
                                    </div> 
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_file" id="nama_file" class="form-control" placeholder="Nama File" />
                                        </div>
                                    </div>
                                
                                  
									<div class="form-group">
                                        <div class="form-line">
											Upload File 
                                            <label for="user_image" class="btn btn-danger"> Hanya File XLS dan XLSX!</label>
											<input type="file" name="user_image" id="user_image" class="form-control" placeholder="upload_excel" />  
                                        </div>
										   <input type="hidden" name="foto" id="foto">
                                    </div>
                                    

								    <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                    <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>

 
    <!-- modal cari pegawai -->
    <div class="modal fade" id="PilihPegawaiModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" > Pilih Pegawai </h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_pegawai" >
  
                                    <thead>
                                        <tr> 
                                   
                                            <th style="width:95%;">No</th>   
                                            <th style="width:95%;">NIP</th>
                                            <th style="width:95%;">Pegawai</th>
                                            <th style="width:95%;">Jabatan</th>
                                             
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_pegawaix">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>
	
	<!-- detail data upload_excel -->
	<div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Data</h4>
                        </div>
                        <div class="modal-body">
						
						<table class="table table-responsive">
                        <tr>
								<td style="font-weight:bold;"> Approval 1</td>
								<td> : </td>
								<td> <p id="approval1"> </p> </td>
								
								<td style="font-weight:bold;"> Date Approval 1 </td>
								<td> : </td>
								<td> <p id="dapproval1"> </p> </td> 
							</tr>
							 
							<tr>
								<td style="font-weight:bold;"> Approval 2</td>
								<td> : </td>
								<td> <p id="approval2"> </p> </td>
								
								<td style="font-weight:bold;"> Date Approval 2</td>
								<td> : </td>
								<td> <p id="dapproval2"> </p> </td> 
                            </tr>
                            
                            <tr>
								<td style="font-weight:bold;"> Approval 3</td>
								<td> : </td>
								<td> <p id="approval3"> </p> </td>
								
								<td style="font-weight:bold;"> Date Approval 3</td>
								<td> : </td>
								<td> <p id="dapproval3"> </p> </td> 
							</tr>

                            <tr>
								<td style="font-weight:bold;"> Approval 4</td>
								<td> : </td>
								<td> <p id="approval4"> </p> </td>
								
								<td style="font-weight:bold;"> Date Approval 4</td>
								<td> : </td>
								<td> <p id="dapproval4"> </p> </td> 
							</tr>

                            <tr>
								<td style="font-weight:bold;"> Approval 5</td>
								<td> : </td>
								<td> <p id="approval5"> </p> </td>
								
								<td style="font-weight:bold;"> Date Approval 5</td>
								<td> : </td>
								<td> <p id="dapproval5"> </p> </td> 
							</tr>

                            <tr>
								<td style="font-weight:bold;"> Approval 6</td>
								<td> : </td>
								<td> <p id="approval6"> </p> </td>
								
								<td style="font-weight:bold;"> Date Approval 6</td>
								<td> : </td>
								<td> <p id="dapproval6"> </p> </td> 
							</tr>

                            <tr>
								<td style="font-weight:bold;"> Approval 7</td>
								<td> : </td>
								<td> <p id="approval7"> </p> </td>
								
								<td style="font-weight:bold;"> Date Approval 7</td>
								<td> : </td>
								<td> <p id="dapproval7"> </p> </td> 
							</tr>

                            <tr>
								<td style="font-weight:bold;"> Approval 8</td>
								<td> : </td>
								<td> <p id="approval8"> </p> </td>
								
								<td style="font-weight:bold;"> Date Approval 8</td>
								<td> : </td>
								<td> <p id="dapproval8"> </p> </td> 
							</tr>
							 
						 
							<tr>
								<td colspan="6" align="center">  
								<img src="" class="img responsive" style="width:50%; height: 50%;" id="foto_dtl">
								</td>
							</tr>
						 
							 <div class="modal-footer">
							  <button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button>
							 </div>
						</table>
                           
					   </div>
                     
                    </div>
                </div>
    </div>
			

    
 
   <script type="text/javascript">
	 
    function PilihPegawai(){
        $("#PilihPegawaiModal").modal({backdrop: 'static', keyboard: false,show:true});
    }
  
    $('#daftar_pegawai').DataTable( {
        "ajax": "<?php echo base_url(); ?>upload_excel/fetch_pegawai" 
    });

     var daftar_pegawai = $('#daftar_pegawai').DataTable();
     
        $('#daftar_pegawai tbody').on('click', 'tr', function () {
            
            var content = daftar_pegawai.row(this).data()
            console.log(content);
            $("#nama").val(content[2]);
            $("#user_id").val(content[4]);
            $("#PilihPegawaiModal").modal('hide');
        } );

        function Show_Detail(id){ 
		$("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
		$.ajax({
			 url:"<?php echo base_url(); ?>approval/fetch_detail/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
                 console.log(result); 
                 var nf = new Intl.NumberFormat(); 
                 $("#approval1").html('<label class="btn btn-lg btn-success">'+result.apr1+'</label>'); 
                 $("#dapproval1").html('<label class="btn btn-lg btn-success">'+result.date_approve_1+'</label>'); 
                 $("#approval2").html('<label class="btn btn-lg btn-success">'+result.apr2+'</label>'); 
                 $("#dapproval2").html('<label class="btn btn-lg btn-success">'+result.date_approve_2+'</label>'); 
                 $("#approval3").html('<label class="btn btn-lg btn-success">'+result.apr3+'</3label>'); 
                 $("#dapproval3").html('<label class="btn btn-lg btn-success">'+result.date_approve_3+'</label>'); 
                 $("#approval4").html('<label class="btn btn-lg btn-success">'+result.apr4+'</label>'); 
                 $("#dapproval4").html('<label class="btn btn-lg btn-success">'+result.date_approve_4+'</label>'); 

                 $("#approval5").html('<label class="btn btn-lg btn-success">'+result.apr5+'</label>'); 
                 $("#dapproval5").html('<label class="btn btn-lg btn-success">'+result.date_approve_5+'</label>'); 
                 $("#approval6").html('<label class="btn btn-lg btn-success">'+result.apr6+'</label>'); 
                 $("#dapproval6").html('<label class="btn btn-lg btn-success">'+result.date_approve_6+'</label>'); 
                 $("#approval7").html('<label class="btn btn-lg btn-success">'+result.apr7+'</3label>'); 
                 $("#dapproval7").html('<label class="btn btn-lg btn-success">'+result.date_approve_7+'</label>'); 
                 $("#approval8").html('<label class="btn btn-lg btn-success">'+result.apr8+'</label>'); 
                 $("#dapproval8").html('<label class="btn btn-lg btn-success">'+result.date_approve_8+'</label>'); 
 
			 }
		 });
	 }
       
	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>upload_excel/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){ 
                
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
                 $("#id_jabatan").val(result.id_jabatan);
                 $("#nama_jabatan").val(result.nama_jabatan);
                 $("#nip").val(result.nip);
                 $("#nama").val(result.nama);
                 $("#alamat").val(result.alamat);
                 $("#telp").val(result.telp);
                 $("#email").val(result.email);
                 $("#foto").val(result.foto);
                  
				 $('#image1').attr('src',"upload/"+result.foto);
                  
			 }
		 });
	 }
 
	 function Bersihkan_Form(){
        $(':input').val(''); 
        $("#image1").attr('src','<?php echo base_url('upload/image_prev.jpg'); ?>');
     }

	 function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('upload_excel/hapus_data')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            { 
               $('#example').DataTable().ajax.reload();  
			    $.notify("Data berhasil dihapus!", {
					animate: {
						enter: 'animated fadeInRight',
						exit: 'animated fadeOutRight'
					}  
				 },{
					type: 'success'
					});
				 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
   
    }
	}

    function Approve(id){
	 
        $.ajax({
            url : "<?php echo base_url('upload_excel/approve_excel_file')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            { 
               $('#example').DataTable().ajax.reload();  
			    $.notify("Data berhasil diapprove!", {
					animate: {
						enter: 'animated fadeInRight',
						exit: 'animated fadeOutRight'
					}  
				 },{
					type: 'success'
					}); 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error approve data');
            }
        });  
	}
    
  
	function Simpan_Data(){
	   
		 var formData = new FormData($('#user_form')[0]);   
         const user_image = $('#user_image').prop('files')[0]; 
         var filetype = user_image.type; 
         if(filetype == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || filetype == 'application/vnd.ms-excel'){
        
             $.ajax({
             url:"<?php echo base_url(); ?>upload_excel/simpan_data",
             type:"POST",
             data:formData,
             contentType:false,  
             processData:false,   
             success:function(result){ 
                
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload(); 
                 $('#user_form')[0].reset();
                 
                 $.notify("Data berhasil disimpan!", {
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                 } 
                 } );
             }
            }); 
         }else{
            alert('File yang diizinkan hanya file XLS dan XLSX!');
         } 
	}
     
 
      
       $(document).ready(function() {
		   
		$("#addmodal").on("click",function(){
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
		});
		
		$("#addmodalx").on("click",function(){
			$("#defaultModalx").modal({backdrop: 'static', keyboard: false,show:true});
            $("#defaultModalLabel").html("Form Tambah Datax");
		});
		
		$('#example').DataTable( {
			"ajax": "<?php echo base_url(); ?>upload_excel/fetch_upload_excel",
      'rowsGroup': [1] 
		});
	 
	    $('#daftar_sales').DataTable( {
            "ajax": "<?php echo base_url(); ?>upload_excel/fetch_kategori" 
        });


		 
	  });
  
		
		 
    </script>