<!DOCTYPE html>
<html>
<head>
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- jQuery 3 -->
<link rel="stylesheet" href="../../bower_components/jquery/dist/jquery.min.js">
<!-- FastClick -->
<link rel="stylesheet" href="../../bower_components/fastclick/lib/fastclick.js">
<!-- AdminLTE App -->
<link rel="stylesheet" href="../../dist/js/adminlte.min.js">
<!-- AdminLTE for demo purposes -->
<link rel="stylesheet" href="../../dist/js/demo.js">
</head>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Forms Edit Data Barang
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Forms Edit</a></li>
        <li class="active">Data Barang</li>
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
              <h3 class="box-title">Masukkan Data Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php foreach ($barang  as $data): ?>
            <form action="<?php echo base_url('admin/upadteBarang');?>" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                    <p class="col-sm-2 text-left">Kode Barang </p>

                    <div class="col-sm-10">
                        <input type="text" name="kode_barang" class="form-control" autocomplete="off" placeholder="Kode Barang" value="<?php echo $data->kode_barang ?>" readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Nama Barang </p>

                    <div class="col-sm-10">
                        <input type="text" name="nama_barang" class="form-control" autocomplete="off" placeholder="Nama Barang" 
                        value="<?php echo $data->nama_barang ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Jenis Barang </p>

                    <div class="col-sm-10">
                        <input type="text" name="jenis_barang" class="form-control" autocomplete="off" placeholder="Jenis Barang" value="<?php echo $data->jenis_barang ?>">
                    </div>
                </div>

				<div class="form-group">
                    <p class="col-sm-2 text-left">Nama Ruang </p>

                    <div class="col-sm-10">
                        <select name="ruang" id="ruang" class="form-control">
                    <option> -- Select Nama Ruang -- </option>
                    <?php foreach ($dtLokasi  as $r): ?>
						<option value="<?=$r['nama_ruang'] ?>"><?=$r['nama_ruang'] ?></option>
					<?php endforeach ?>
                  </select>	
                    </div>
                </div>
				
                <div class="form-group">
                    <p class="col-sm-2 text-left">Jumlah </p>

                    <div class="col-sm-10">
                        <input type="text" name="jumlah" class="form-control" autocomplete="off" placeholder="Jumlah" value="<?php echo $data->jumlah ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Keterangan </p>

                    <div class="col-sm-10">
                        <textarea name="keterangan"><?php echo $data->keterangan ?></textarea>
                    </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			  <div class="col-sm-offset-3 col-sm-10">
                <a href="<?php echo base_url('admin/dtBarang');?>" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info">Simpan</button>
			  </div>
              </div>
              <!-- /.box-footer -->
            </form>
			<?php endforeach ?>
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

  

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
</body>
</html>
