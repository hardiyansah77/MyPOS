 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Bus
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Transaksi Bus</a></li>
        <li class="active">Data Bus</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data bus</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<a href="<?php echo base_url('admin/formAddBus');?>" class="btn btn-white btn-info btn-bold"><i class="fa glyphicon-plus "></i> Add New Data</a><br><br>
				<?php 
				if(isset($_GET['message'])){
					$message = $_GET['message'];
					if($message == "input"){
						echo '<div class="alert alert-block alert-success">
							<button type="button" class="close" data-dismiss="alert">
								<i class="ace-icon fa fa-times"></i>
							</button>
								<i class="ace-icon fa fa-check green"></i>
									Data successfully inputted.
						</div>';
					}else if($message == "update"){
						echo '<div class="alert alert-block alert-success">
							<button type="button" class="close" data-dismiss="alert">
								<i class="ace-icon fa fa-times"></i>
							</button>
								<i class="ace-icon fa fa-check green"></i>
									Data successfully updated.
						</div>';
					}else if($message == "delete"){
						echo '<div class="alert alert-block alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="ace-icon fa fa-times"></i>
								</button>
									<i class="ace-icon fa fa-check green"></i>
										Data successfully deleted.
							</div>';
					}else if($message == "gagal"){
						echo '<div class="alert alert-block alert-success">
								<button type="button" class="close" data-dismiss="alert">
									<i class="ace-icon fa fa-times"></i>
								</button>
									<i class="ace-icon fa fa-check green"></i>
										NO STNK Sudah Ada.
							</div>';
					}
				}
			?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>No STNK</th>
                  <th>Tipe Bus</th>
                  <th>Nama Bus</th>
				          <th>Jumlah Penumpang</th>
				          <th>Keterangan</th>
				          <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php $no=1; foreach ($dtBus  as $r): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?=$r['no_stnk'] ?></td>
                  <td><?=$r['tipe_bus'] ?></td>
                  <td> <?=$r['nama_bus'] ?></td>
                  <td> <?=$r['jumlah_penumpang'] ?></td>
                 <td> <?=$r['keterangan'] ?></td>
				  <td>
                  
				  <center>
					<div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="<?=base_url();?>admin/formEditBus/<?=$r['no_stnk'] ?>">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<a class="red" href="<?=base_url();?>admin/deleteBus/<?=$r['no_stnk'] ?>">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div></center>
				  </td>
                </tr>
				<?php endforeach ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
