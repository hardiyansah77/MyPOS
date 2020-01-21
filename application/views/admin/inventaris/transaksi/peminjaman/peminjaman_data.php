<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<div class="row">
    <div class="col-lg-12">
		<div class="box box-info">
		<div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
			<div class="col-md-6">
			<form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                            <label class="col-lg-4 ">No. Transaksi</label>
                            <div class="col-lg-7">
                                <input type="text" id="no_transaksi" name="no_transaksi" class="form-control" value="<?php echo $autonumber ?>" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Tgl Pinjam</label>
                            <div class="col-lg-7">
                                <input type="text" id="tgl_pinjam" name="tgl_pinjam" class="form-control" value="<?php 
                                echo $tglpinjam; ?>" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Tgl Kembali</label>
                            <div class="col-lg-7">
                                <input type="text" id="tgl_kembali" name="tgl_kembali" class="form-control" value="<?php echo $tglkembali; ?>" readonly="readonly">
                            </div>
                        </div>
              </div>
		 </div>
		 
		 <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4 ">NIK</label>
                            <div class="col-lg-7">
                                <select name="nik" class="form-control" id="nik">
                                    <option> </option>
                                    <?php foreach($karyawan as $da): ?> 
                                    <option  value="<?php echo $da->nik ?>"><?php echo $da->nik ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Nama Karyawan</label>
                            <div class="col-lg-7">
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
			</div>
			
		<div class="box box-info">
			<div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
			
		<div class="box box-info">
			<div class="form-inline">
                    <div class="form-group">
                        <label>Kode barang</label>
                        <input type="text" class="form-control"  id="kode_barang" >
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control"  id="nama_barang" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label >Jenis Barang</label>
                        <input type="text" class="form-control"  id="jenis_barang" readonly="readonly">
                    </div>
                    <div class="form-group ">
                        <label class="sr-only">Tombol Tambah Barang</label>
                        <button id="tambah_barang" class="btn btn-primary"> Tambah Barang <i class="glyphicon glyphicon-plus"></i></button>
                    </div>
                    <div class="form-group">
                        <label class="sr-only">Tombol Cari Barang</label>
                        <button id="cari" class="btn btn-success"> Cari Barang <i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                <br /><br />
				<!-- buat tampil tabel tmp     -->
                <div id="tampil"></div>
            </div>
			
			<div class="box-footer">
			<button type="submit" class="btn btn-info pull-right">Simpan</button>
			</div>
		</div>
		<!-- end data barang -->

		
		</div>
    <!-- /.col-lg-12 -->

</div>
<!-- /.end row -->
		
		<!-- Modal Cari barang -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Cari Barang</strong></h4>
        </div>
        <div class="modal-body"><br />
            <!--<label class="col-lg-4 control-label">Cari Nama Barang</label>-->
            <input type="text" name="caribarang" id="caribarang" class="form-control" placeholder="Masukkan Kode Barang atau Nama Barang">

            <div id="tampilbarang"></div>

        </div>

        <br /><br />
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End Modal Cari barang -->
		
	<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>		
		
			
			