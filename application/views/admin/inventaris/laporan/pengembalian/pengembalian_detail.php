 <div class="row">
    <div class="col-xs-12">

        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Laporan Pengembalian</h3>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-lg-4">ID Transaksi</label>
                            <div class="col-lg-5">
                                : <?php echo $pengembalian['id_transaksi'];?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4">Tgl Pengembalian</label>
                            <div class="col-lg-5">
                                : <?php echo $pengembalian['tgl_pengembalian'];?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4">Status</label>
                            <div class="col-lg-5">
                                : <?php echo $pengembalian['status_pinjam'];?>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Kode Barang</td>
                            <td>Nama Barang</td>
                            <td>Jenis Barang</td>
                        </tr>
                    </thead>
                    <?php foreach($detailjpengembalian as $row):?>
                    <tr>
                        <td><?php echo $row->kode_barang;?></td>
                        <td><?php echo $row->nama_barang;?></td>
                        <td><?php echo $row->jenis_barang;?></td>
                    </tr>
                    <?php endforeach;?>
                </table>

                <!--<p class="text-right">
                <a href="" ><button  class="btn btn-primary"> Kembali</button></a></p>-->
            </div> <!-- end panel body -->
        
        </div><!-- end panel -->

    </div> <!-- end lg -->
</div> <!-- end row -->

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
