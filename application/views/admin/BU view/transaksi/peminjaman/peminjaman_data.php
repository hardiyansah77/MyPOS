  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi Peminjaman
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Forms Peminjaman</a></li>
        <li class="active"> Transaksi Peminjaman</li>
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
              <h3 class="box-title">Transaksi Peminjaman</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
            <form action="<?php echo base_url('admin/actionAddTransaksiInventaris');?>" method="post" class="form-horizontal">
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
						  Data peminjaman berhasil diinput.
					</div>';
				  }else if($message == "gagal"){
                            echo '<div class="alert alert-block alert-success">
                              <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                              </button>
                                <i class="ace-icon fa fa-check green"></i>
                                  jumlah barang melebihi.
                            </div>';
                          }
				else if($message == "update"){
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
				<div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">No Transaksi</label>
                            <div class="col-sm-5">
                                <input type="text" name="id_transaksi" id="id_transaksi" class="form-control" value="<?php echo $autonumber ?>" readonly="readonly">
                            </div>
                        </div>
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">NIK</label>

                  <div class="col-sm-5">
				  <input type="hidden" name="no_transaksi" id ="no_transaksi" class="form-control" >
                    <select name="nik" id="nik" class="form-control">
                    <option> -- Select NIK -- </option>
                    <?php foreach ($dtKaryawan  as $r): ?>
						<option value="<?=$r['nik'] ?>"><?=$r['nik'] ?></option>
					<?php endforeach ?>
                  </select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Karyawan</label>

                  <div class="col-sm-5">
					<input type="text" name="nama" id ="nama" class="form-control" placeholder="Nama karyawan ..." readonly>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Kode Barang</label>

                  <div class="col-sm-5">
                    <select name="kode_barang" id="kode_barang" class="form-control">
                    <option> -- Select kode barang -- </option>
                    <?php foreach ($dtBarang  as $r): ?>
						<option value="<?=$r['kode_barang'] ?>"><?=$r['kode_barang'] ?></option>
					<?php endforeach ?>
                  </select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Barang</label>

                  <div class="col-sm-5">
					<input type="text" name="nama_barang" id ="barang" class="form-control" placeholder="Nama barang ..." readonly>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Jenis Barang</label>

                  <div class="col-sm-5">
					<input type="text" name=""  id ="jenis" class="form-control" placeholder="Jenis barang ..." readonly>
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Jumlah</label>

                  <div class="col-sm-5">
					<input type="text" name="jumlah" id ="jumlah" class="form-control" placeholder="jumlah ..." readonly>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Jumlah Barang</label>

                  <div class="col-sm-5">
                    <input type="number" required name="jml_barang" class="form-control" id="inputEmail3" placeholder="Jumlah barang ...">
                  </div>
                </div>
				<div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Pinjam</label>
                            <div class="col-sm-5">
                                <input type="text" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="<?= $tglpinjam; ?>" readonly="readonly"> 
                            </div>
                        </div>
                        
                 <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Kembali</label>
                            <div class="col-sm-5">
                                <input type="text" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="<?= $tglkembali; ?>" readonly="readonly"> 
                            </div>
                        </div>
				<div class="form-group">
						<label class="col-sm-3 control-label"> </label>
					 <div class="col-sm-5">
					<input type="hidden" name="status" id="status" class="form-control" autocomplete="off"  placeholder="status ..."> 
				 </div>
                </div>
						
					
				
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			  <div class="col-sm-offset-3 col-sm-10">					
                <button type="submit" class="btn btn-default">Batal</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-info">Simpan</button>
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
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<script type="text/javascript">
$( "select[name='nik']" ).change(function () {
    var namaID = $(this).val();


    if(namaID) {


        $.ajax({
            url: "<?php echo base_url('ajax/getDtNama');?>",
            dataType: 'Json',
            data: {'nama':namaID},
            success: function(data) {
				$('#nama').val(data)
				//console.log(data);
            }
        });


    }else{
        $('select[name="nama"]').empty();
    }
});

$( "select[name='kode_barang']" ).change(function () {
    var barangID = $(this).val();


    if(barangID) {

        $.ajax({
            url: "<?php echo base_url('ajax/getDtBarang');?>",
            dataType: 'Json',
            data: {'barang':barangID},
            success: function(data) {
				$('#barang').val(data.barang)
				$('#jenis').val(data.jenis)
				$('#jumlah').val(data.jumlah)
				//console.log(data);
            }
        });


    }else{
        $('select[name="barang"]').empty();
    }
});
//datepicker
    $("#tanggal_pinjam").datepicker({
        format:'dd-mm-yyyy'
    });
    
    $("#tanggal_kembali").datepicker({
        format:'dd-mm-yyyy'
    });
    
    $("#tanggal").datepicker({
        format:'dd-mm-yyyy'
    });






</script>
</body>
</html>
