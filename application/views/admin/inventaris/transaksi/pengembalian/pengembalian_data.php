<div class="row">
   <div class="col-lg-12">
		<div class="box box-info">
		<div class="box-header with-border">
              <h3 class="box-title">Transaksi Peminjaman</h3>
            </div>
			
			<form class="form-horizontal" action="" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 ">No. Transaksi</label>
                            <div class="col-lg-5">
                                <input type="text" name="no_transaksi" id="no_transaksi" class="form-control">
                                <span class="text-danger">*) tekan enter</span>
                            </div>
                            
                            <div class="col-lg-2">
                                <a href="#" class="btn btn-success" id="cari_nik"> Cari &nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</a>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 ">Tgl. Pinjam</label>
                            <div class="col-lg-8">
                                <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 ">Tgl. Kembali</label>
                            <div class="col-lg-8">
                                <input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4 ">NIK</label>
                            <div class="col-lg-8">
                                <input type="text" name="nik" id="nik" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Nama</label>
                            <div class="col-lg-8">
                                <input type="text" name="nama" id="nama" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        <input type="hidden" name="kode_barang" id="kode_barang">
						
			<!-- tampil barang -->
            <div id="tampilbarang"></div>
            <!-- end tampil barang -->
			
					</div>
					
		<div class="panel-footer">
                <button id="simpan_transaksi" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            </div>
        </div><!-- end panel -->

    </div> <!-- end lg -->
</div> <!-- end row -->

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

