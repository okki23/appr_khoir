

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $judul; ?></title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
 
    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
     
    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />
    
    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/sweetalert.css" rel="stylesheet">
   <!--  <link href="<?php echo base_url(); ?>assets/css/orgchart.css" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/css/themes/all-themes.css" rel="stylesheet" />
	
	<link href="<?php echo base_url(); ?>assets/css/card_custom.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet" />
    
    <!-- Jquery Core Js -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
   <!--  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jput.min.js"></script> -->

   
    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/sweetalert.js"></script>
    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    
 

    <script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>js/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url(); ?>js/filterDropDown.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/dataTables.rowsGroup.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script> 
 
    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.numeric.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
   
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script> 
 
    <script src="<?php echo base_url(); ?>assets/plugins/autosize/autosize.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/ui/notifications.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/momentjs/moment.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>   
    <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
  
 
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/forms/form-wizard.js"></script>
    <script type="text/javascript">
     //$("#wrapper").toggleClass("toggled");
    </script>
     
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Mohon Tunggu...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
     
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>"> <?php echo $judul; ?> </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true">    <i class="material-icons">person</i>   </a></li>
                <!-- <li class="pull-right"> <a href="<?php echo base_url('login'); ?>" class="btn btn-warning btn-lg"> <i class="material-icons">person</i>  Login </a> </li>  -->
                    <!-- <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true">    <i class="material-icons">person</i>   </a></li> -->
                   
                </ul>
            </div>
        </div>
    </nav>

    <aside id="rightsidebar" class="right-sidebar">
      
            <div class="tab-content">
             
                    <div class="demo-settings">
                        <p> Welcome <?php echo $this->session->userdata('username') . " !"; ?> </p>
                        <p> Level :  <?php echo level_help($this->session->userdata('level')); ?> </p>
                         
                        <div align="center">
                            <img src="<?php echo base_url('upload/'.$this->session->userdata('foto')); ?>" style="width:100px; height:100px;">
                        </div>
 
                        <ul class="demo-choose-skin">
                       
                         <a href="<?php echo base_url('login/logout'); ?>">
                        <li>
                          
                           <i class="material-icons">power_settings_new</i>
                            <span align="center">Keluar</span>
                         
                        </li>
                          </a>
                       
                        </ul>
                    </div>
                
            </div>
        </aside>
    <!-- #Top Bar -->
    
    <section>
          <div class="container-fluid">

          <div class="block-header">
            <br>
            &nbsp;       
            <br>
            &nbsp;       
            <br>
            &nbsp;       
            </div>
             
                
                        <div class="card">
                        <div class="header">
                            <h2>
                              Informasi Grafis Realtime Barang 
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                            </div>

                          

                        </div>



                        <div class="card">
                        <div class="header">
                            <h2>
                                Daftar Stok Barang
                            </h2>
                           
                        </div>
                        <div class="body">
                        <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
									<thead>
										<tr> 
											<th style="width:5%;">Kategori Barang</th>
                                            <th style="width:5%;">Sub Kategori Barang</th>
                                            <th style="width:5%;">Nama Barang</th>                                           
                                            <th style="width:10%;">Qty Jakarta</th> 
                                            <th style="width:10%;">Qty Subang</th> 
										</tr>
									</thead> 
                                    <tbody>
                                    <?php
                                        foreach($listingbarang as $k => $v){
                                            echo "<tr> 
                                            <td>".$v->nama_kategori."
                                            <td>".$v->nama_sub_kategori."
                                            <td>".$v->nama_barang."
                                            <td>".$v->qty_jkt."
                                            <td>".$v->qty_subang."
                                            </tr>";
                                        }
                                    ?>
                                    </tbody>
								</table> 
                            </div>
                             
                        </div>
                    </div>




           
                    </div>
                </div>
            </div>
                  </div>

                  
</section>
 
 
</body>

</html>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

 <script>
  
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

 
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Realtime Persediaan Barang'
    },
    xAxis: {
        categories:  <?php echo $datacat; ?>,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Stok (Qty)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Item(s)</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jakarta',
        data: <?php echo $datajkt; ?>,
        color: '#fcdb03'

    }, {
        name: 'Subang',
        data: <?php echo $datasbg; ?>,
        color: '#3234a8'

    }]
});
    </script>
 

<script type="text/javascript" src="<?php echo base_url('assets/'); ?>grouped-categories.js"></script>

<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/'); ?>html2canvas.js"></script>
 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url('assets/orgchart/'); ?>org_new.css">
<link rel="stylesheet" href="<?php echo base_url('assets/css/'); ?>css_chart.css">
<script type="text/javascript" src="<?php echo base_url('assets/orgchart/'); ?>org.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/orgchart/'); ?>orgExtras.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/orgchart/'); ?>scripts.js"></script>
 
 