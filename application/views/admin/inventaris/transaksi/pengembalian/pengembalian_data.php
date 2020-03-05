  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi Pengembalian
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Forms Pengembalian</a></li>
        <li class="active"> Transaksi Pengembalian</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Transaksi Pengembalian</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
            <form action="<?php echo base_url('admin/simpan_transaksi');?>" method="post" class="form-horizontal">
              <div class="box-body">
				<?php 
				if(isset($_GET['message'])){
				  $message = $_GET['message'];
				  if($message == "input"){
					echo '<div class="alert alert-block alert-success">
					  <button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					  </button>
						<i class="ace-icon fa fa-check green"></i>
						  Data Pengembalian berhasil diinput.
					</div>';
				  
				  }else if($message == "update"){
                            echo '<div class="alert alert-block alert-success">
                              <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                              </button>
                                <i class="ace-icon fa fa-check green"></i>
                                  Status Berubah.
                            </div>';
                          }
				}
			  ?>
			  
				<div class="col-md-6">
				<div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">No. Transaksi</label>
                        <div class="col-sm-5">
                          <input type="text" name="id_transaksi" id="id_transaksi" class="form-control">
                              <span class="text-danger">*) tekan enter</span>
                            </div>
                            
					<div class="col-sm-2">
                      <a href="#" class="btn btn-success" id="cari_nik" > Cari &nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</a>
                            </div>
                        </div>
						
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tgl Pinjam</label>
                     <div class="col-sm-5">
                        <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tgl Kembali</label>
                     <div class="col-sm-5">
					 <input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control" readonly="readonly">
					  
                            </div>
                        </div>
					</div>
				<div class="col-md-6">		
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">NIK</label>
                     <div class="col-sm-5">
                        <input type="text" name="nik" id="nik" class="form-control" readonly="readonly">
                            </div>
                        </div>
				 <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" name="nama" id="nama" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        <input type="hidden" name="kode_barang" id="kode_barang">
			<!-- tampil barang -->
            <div id="tampilbarang"></div>
            <!-- end tampil barang -->
			</div>						
				
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			  <div class="col-sm-offset-8 col-sm-10">					
                <button id="simpan_transaksai" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
			  </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Modal Cari barang -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Transaksi Pengembalian</strong></h4>
        </div>
        <div class="modal-body"><br />
            
            <input type="text" name="carinik" id="carinik" class="form-control" placeholder="Masukkan NIK Karyawan">

            <div id="tampilnik"></div>

        </div>

        <br /><br />
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      
        </div>
    </div>
    </div>
</div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/bootstrap-datepicker.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>

<script>
$(document).ready(function() {

    //alert('');

    //load datatable
    $('#dataTables-example').DataTable({
        responsive: true
    });

    //show modal nik
    $("#cari_nik").click(function(){
        $("#myModal3").modal("show");
    });

    //cari by nik
    $("#carinik").keyup(function(){
        var nik = $("#carinik").val();
        
        $.ajax({
            url:"<?php echo site_url('admin/cari_nik');?>",
            type:"POST",
            data:"nik="+nik,
            cache:false,
            success:function(hasil){
                // console.log(hasil);
                $("#tampilnik").html(hasil);
            }
        })
    })


    //tambahkan data dari modal ke form berdasarkan id_transaksi
    $('body').on('click', '.tambahkan', function(){

        var id_transaksi = $(this).attr("id_transaksi");
        // console.log(id_transaksi);
        $("#id_transaksi").val(id_transaksi);
        $("#myModal3").modal("hide");
        $("#id_transaksi").focus();

          var id_transaksi = $("#id_transaksi").val();
            
            $.ajax({
                url:"<?php echo site_url('admin/cari_transaksi');?>",
                type:"POST",
                data:"id_transaksi="+id_transaksi,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    
                  
                   if(hasil=="") {
                       //alert("Data tidak ditemukan");
                   }
                   else{
                    //    console.log(hasil);
                       data = hasil.split("|");
                       $("#nik").val(data[0]);  
                       $("#tgl_pinjam").val(data[1]);
                       $("#tgl_kembali").val(data[2]);
                       $("#nama").val(data[3]); 
                       $("#kode_barang").val(data[4]);

                       $("#tampilbarang").load("<?php echo site_url('admin/tampil_barang') ?>",
                       "id_transaksi="+id_transaksi);
                   }

                  
                }
            }) 

    });
    

    

    //keypress no_transaksi
    $("#id_transaksi").keyup(function(){



            var id_transaksi = $("#id_transaksi").val();
            
            $.ajax({
                url:"<?php echo site_url('admin/cari_transaksi');?>",
                type:"POST",
                data:"id_transaksi="+id_transaksi,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    
                  
                   if(hasil=="") {
                       //alert("Data tidak ditemukan");
                   }
                   else{
                    //    console.log(hasil);
                       data = hasil.split("|");
                       $("#nik").val(data[0]);  
                       $("#tgl_pinjam").val(data[1]);
                       $("#tgl_kembali").val(data[2]);
                       $("#nama").val(data[3]); 
                       $("#kode_barang").val(data[4]);


                    //    $("#denda").attr("disabled", false);
                    //    $("#denda").focus();

                       $("#tampilbarang").load("<?php echo site_url('admin/tampil_barang') ?>",
                       "id_transaksi="+id_transaksi);
                   }

                   //console.log(data);
                }
            }) //end ajax



    }) //end keypress


    $("#simpan_transaksi").click(function(){

        var id_transaksi = $("#id_transaksi").val();
        var nik          = $("#nik").val();  
        var kode_barang  = $("#kode_barang").val();  

        if(id_transaksi == "" || nik == ""){
            alert("Pilih ID Transaksi");
            $("#id_transaksi").focus();
            return false;
        }
        
        else {
            $.ajax({
                url:"<?php echo site_url('admin/simpan_transaksi');?>",
                type:"POST",
                data:"id_transaksi="+id_transaksi+"&kode_barang="+kode_barang,
                cache:false,
                success:function(){
                    alert("Transaksi berhasil disimpan");
                    location.reload();
                }
            })//end ajax
        }
       
     

    }) //end simpan_transaksai

    

    
   


  

});
</script>
</body>
</html>
