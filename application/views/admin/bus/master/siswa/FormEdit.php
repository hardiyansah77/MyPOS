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
			<?php foreach ($tbl_siswa  as $data): ?>
            <form action="<?php echo base_url('admin/updateSiswa');?>" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                    <p class="col-sm-2 text-left">NIS </p>

                    <div class="col-sm-10">
                        <input type="text" name="nis" class="form-control" autocomplete="off" placeholder="NIS" value="<?php echo $data->nis ?>" readonly="readonly">
                    </div>
                </div>
				
				<div class="form-group">
                    <p class="col-sm-2 text-left">Nama Siswa </p>

                    <div class="col-sm-10">
                        <input type="text" name="nama_siswa" class="form-control" autocomplete="off" placeholder="Nama Siswa" value="<?php echo $data->nama_siswa ?>" readonly="readonly">
                    </div>
                </div>
				
				<div class="form-group">
                    <p class="col-sm-2 text-left">Nama Orang Tua </p>

                    <div class="col-sm-10">
                        <input type="text" name="nama_orangtua" class="form-control" autocomplete="off" placeholder="Nama Orang Tua" value="<?php echo $data->nama_orangtua ?>" readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Kelas </p>

                    <div class="col-sm-10">
                        <input type="text" name="kelas" class="form-control" autocomplete="off" placeholder="Kelas" value="<?php echo set_value('kelas'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Jenis Kelamin </p>

                     <div class="col-sm-10">
                        <select name="jenis_kelamin" class="form-control" >
                        <option value="">- Pilih Jenis -</option>
                        <option value="L" <?php echo set_select('jenis','L'); ?> >Laki Laki</option>
                        <option value="P" <?php echo set_select('jenis','P'); ?>>Perempuan</option>
                    </select>   
                    </div>
                </div>

           <div class="form-group">
                    <p class="col-sm-2 text-left">Kota Kelahiran</p>

                     <div class="col-sm-10">
                        <input type="text" name="tempat_lahir" class="form-control" autocomplete="off" placeholder="Kota Kelahiran" value="<?php echo set_value('tempat_lahir'); ?>">
                    </div>
                </div>
				<div class="form-group">
                    <p class="col-sm-2 text-left">Tanggal Lahir</p>

                     <div class="col-sm-10">
                        <input type="date" name="tanggal_lahir" class="form-control" autocomplete="off" placeholder="Tanggal Lahir" value="<?php echo set_value('tanggal_lahir'); ?>">
                    </div>
                </div>
				<div class="form-group">
                    <p class="col-sm-2 text-left">Alamat</p>

                     <div class="col-sm-10">
                        <input type="text" name="alamat" class="form-control" autocomplete="off" placeholder="Alamat" value="<?php echo set_value('alamat'); ?>">
                    </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			  <div class="col-sm-offset-3 col-sm-10">
                <a href="<?php echo base_url('admin/dtSiswa');?>" class="btn btn-default">Batal</a>
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
