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
                                Approval
                            </h2>
                              
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
											<input type="file" name="user_image" id="user_image" class="form-control" placeholder="approval" />  
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
			

    
	<!-- detail data upload_excel -->
	<div class="modal fade" id="ApproveModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Data</h4>
                        </div>
                        <div class="modal-body">
						<input type="hidden" id="idapprove" name="idapprove" readonly="readonly">
                        <input type="hidden" id="user" name="user" readonly="readonly" value="<?php echo $this->session->userdata("userid"); ?>">
						<table class="table table-responsive">
                            <tr>
								<td style="font-weight:bold;"> Approval 1</td>
								<td> : </td>
								<td> 
                                    <button type="button" id="apr1" onclick="Approve1();" class="btn btn-default waves-effect approvalbtn"> Approve </button>
                                    <p id="appr1info"></p>
                                </td> 
							</tr>
							 
							<tr>
								<td style="font-weight:bold;"> Approval 2</td>
								<td> : </td>
								<td>  
									<button type="button" id="apr2" onclick="Approve2();" class="btn btn-default waves-effect approvalbtn"> Approve </button>
                                    <p id="appr2info"></p>
                                </td> 
                            </tr>

							<tr>
								<td style="font-weight:bold;"> Approval 3</td>
								<td> : </td>
								<td>  
									<button type="button" id="apr3" onclick="Approve3();" class="btn btn-default waves-effect approvalbtn"> Approve </button>
                                    <p id="appr3info"></p>
                                </td> 
                            </tr>

							<tr>
								<td style="font-weight:bold;"> Approval 4</td>
								<td> : </td>
								<td>  
									<button type="button" id="apr4" onclick="Approve4();" class="btn btn-default waves-effect approvalbtn"> Approve </button>
                                    <p id="appr4info"></p>
                                </td> 
                            </tr>

							<tr>
								<td style="font-weight:bold;"> Approval 5</td>
								<td> : </td>
								<td>  
									<button type="button" id="apr5" onclick="Approve5();" class="btn btn-default waves-effect approvalbtn"> Approve </button>
                                    <p id="appr5info"></p>
                                </td> 
                            </tr>
 
							<tr>
								<td style="font-weight:bold;"> Approval 6</td>
								<td> : </td>
								<td>  
									<button type="button" id="apr6" onclick="Approve6();" class="btn btn-default waves-effect approvalbtn"> Approve </button>
                                    <p id="appr6info"></p>
                                </td> 
                            </tr>

							<tr>
								<td style="font-weight:bold;"> Approval 7</td>
								<td> : </td>
								<td>  
									<button type="button" id="apr7" onclick="Approve7();" class="btn btn-default waves-effect approvalbtn"> Approve </button>
                                    <p id="appr7info"></p>
                                </td> 
                            </tr>

							<tr>
								<td style="font-weight:bold;"> Approval 8</td>
								<td> : </td>
								<td>  
									<button type="button" id="apr8" onclick="Approve8();" class="btn btn-default waves-effect approvalbtn"> Approve </button>
                                    <p id="appr8info"></p>
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

	function Approve1(){ 
        var idapprove = $("#idapprove").val();
        var user = $("#user").val();
		var approve = 1; 
        $.ajax({
            url:"<?php echo base_url('approval/update_status_a'); ?>",
            data:{approve:approve,idapprove:idapprove,user:user},
            type:"POST",
            success:function(result){
                    console.log(result);
                    $("#ApproveModal").modal('hide');
                    $('#example').DataTable().ajax.reload();  
					$.notify("Approve berhasil!", {
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
					} 
					},{
						type: 'success'
					});
            } 
        });
    }

	function Approve2(){ 
        var idapprove = $("#idapprove").val();
        var user = $("#user").val();
		var approve = 2; 
        $.ajax({
            url:"<?php echo base_url('approval/update_status_b'); ?>",
            data:{approve:approve,idapprove:idapprove,user:user},
            type:"POST",
            success:function(result){
                    console.log(result);
                    $("#ApproveModal").modal('hide');
                    $('#example').DataTable().ajax.reload();  
            } 
        });
    }

	function Approve3(){ 
        var idapprove = $("#idapprove").val();
        var user = $("#user").val();
		var approve = 3; 
        $.ajax({
            url:"<?php echo base_url('approval/update_status_c'); ?>",
            data:{approve:approve,idapprove:idapprove,user:user},
            type:"POST",
            success:function(result){
                    console.log(result);
                    $("#ApproveModal").modal('hide');
                    $('#example').DataTable().ajax.reload();  
            } 
        });
    }
 
	function Approve4(){ 
        var idapprove = $("#idapprove").val();
        var user = $("#user").val();
		var approve = 4; 
        $.ajax({
            url:"<?php echo base_url('approval/update_status_d'); ?>",
            data:{approve:approve,idapprove:idapprove,user:user},
            type:"POST",
            success:function(result){
                    console.log(result);
                    $("#ApproveModal").modal('hide');
                    $('#example').DataTable().ajax.reload();  
            } 
        });
    }

	function Approve5(){ 
        var idapprove = $("#idapprove").val();
        var user = $("#user").val();
		var approve = 5; 
        $.ajax({
            url:"<?php echo base_url('approval/update_status_e'); ?>",
            data:{approve:approve,idapprove:idapprove,user:user},
            type:"POST",
            success:function(result){
                    console.log(result);
                    $("#ApproveModal").modal('hide');
                    $('#example').DataTable().ajax.reload();  
            } 
        });
    }

	function Approve6(){ 
        var idapprove = $("#idapprove").val();
        var user = $("#user").val();
		var approve = 6; 
        $.ajax({
            url:"<?php echo base_url('approval/update_status_f'); ?>",
            data:{approve:approve,idapprove:idapprove,user:user},
            type:"POST",
            success:function(result){
                    console.log(result);
                    $("#ApproveModal").modal('hide');
                    $('#example').DataTable().ajax.reload();  
            } 
        });
    }

	function Approve7(){ 
        var idapprove = $("#idapprove").val();
        var user = $("#user").val();
		var approve = 7; 
        $.ajax({
            url:"<?php echo base_url('approval/update_status_g'); ?>",
            data:{approve:approve,idapprove:idapprove,user:user},
            type:"POST",
            success:function(result){
                    console.log(result);
                    $("#ApproveModal").modal('hide');
                    $('#example').DataTable().ajax.reload();  
            } 
        });
    }

	function Approve8(){ 
        var idapprove = $("#idapprove").val();
        var user = $("#user").val();
		var approve = 8; 
        $.ajax({
            url:"<?php echo base_url('approval/update_status_h'); ?>",
            data:{approve:approve,idapprove:idapprove,user:user},
            type:"POST",
            success:function(result){
                    console.log(result);
                    $("#ApproveModal").modal('hide');
                    $('#example').DataTable().ajax.reload();  
            } 
        });
    }

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
     
   
    function Approve(id){ 
		$("#ApproveModal").modal('show'); 
        $("#idapprove").val(id); 
        $.ajax({
			 url:"<?php echo base_url(); ?>approval/fetch_detail/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
				var respons = result; 
				// $("#apr1").show();
				// $("#apr2").show();
                if(respons.approve_1 === "" || respons.approve_1 === null){ 
					$("#apr1").show();
					$("#appr1info").html("");
				 
				}else{
					$("#apr1").hide();
					$("#appr1info").html("<br> <b>was approved by "+respons.apr1+" on "+respons.date_approve_1+"</b>");
				}

				if(respons.approve_2 === "" || respons.approve_2 === null){ 
					$("#apr2").show();
					$("#appr2info").html("");
				 
				}else{
					$("#apr2").hide();
					$("#appr2info").html("<br> <b>was approved by "+respons.apr2+" on "+respons.date_approve_2+"</b>");
				}

				if(respons.approve_3 === "" || respons.approve_3 === null){ 
					$("#apr3").show();
					$("#appr3info").html("");
				 
				}else{
					$("#apr3").hide();
					$("#appr3info").html("<br> <b>was approved by "+respons.apr3+" on "+respons.date_approve_3+"</b>");
				}

				if(respons.approve_4 === "" || respons.approve_4 === null){ 
					$("#apr4").show();
					$("#appr4info").html("");
				 
				}else{
					$("#apr4").hide();
					$("#appr4info").html("<br> <b>was approved by "+respons.apr4+" on "+respons.date_approve_4+"</b>");
				}

				if(respons.approve_5 === "" || respons.approve_5 === null){ 
					$("#apr5").show();
					$("#appr5info").html("");
				 
				}else{
					$("#apr5").hide();
					$("#appr5info").html("<br> <b>was approved by "+respons.apr5+" on "+respons.date_approve_5+"</b>");
				}

				if(respons.approve_6 === "" || respons.approve_6 === null){ 
					$("#apr6").show();
					$("#appr6info").html("");
				 
				}else{
					$("#apr6").hide();
					$("#appr6info").html("<br> <b>was approved by "+respons.apr6+" on "+respons.date_approve_6+"</b>");
				}

				if(respons.approve_7 === "" || respons.approve_7 === null){ 
					$("#apr7").show();
					$("#appr7info").html("");
				 
				}else{
					$("#apr7").hide();
					$("#appr7info").html("<br> <b>was approved by "+respons.apr7+" on "+respons.date_approve_7+"</b>");
				}

				if(respons.approve_8 === "" || respons.approve_8 === null){ 
					$("#apr8").show();
					$("#appr8info").html("");
				 
				}else{
					$("#apr8").hide();
					$("#appr8info").html("<br> <b>was approved by "+respons.apr8+" on "+respons.date_approve_8+"</b>");
				}
			  
  
 
			 }
		 });
	}
     
       $(document).ready(function() {
		$(".approvalbtn").hide();
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
			"ajax": "<?php echo base_url(); ?>approval/fetch_approval",
             'rowsGroup': [1] 
		});
	   
	  });
   
    </script>