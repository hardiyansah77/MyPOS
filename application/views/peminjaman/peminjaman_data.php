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
			
            <form action="<?php echo base_url('admin/simpan_peminjaman');?>" method="post" class="form-horizontal">
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
				<div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4 ">No. Transaksi</label>
                            <div class="col-lg-7">
                                <input type="text" id="id_transaksi" name="id_transaksi" class="form-control" value="<?php echo $autonumber ?>" readonly="readonly">
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
					<div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4 ">NIK</label>
                            <div class="col-lg-7">
                                <select name="nik" class="form-control" id="nik">
                                   <option> -- Select NIK -- </option>
                            <?php foreach ($dtKaryawan  as $r): ?>
						<option value="<?=$r['nik'] ?>"><?=$r['nik'] ?></option>
							<?php endforeach ?>
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
			 </div>
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          <!-- /.box -->
		   <!-- data barang -->
        <div class="box box-info">
            <div class="box-header with-border">
                <strong>Data Barang</strong>
            </div>
            
            <div class="panel-body">
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
         <div class="panel-footer">
                <button id="simpan"  class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
            </div>
        </div>
        <!-- end data barang -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    //alert('');

    $('#dataTables-example').DataTable({
        responsive: true
    });


    //load data tmp 
    function loadData()
    {
        $("#tampil").load("<?php echo site_url('admin/tampil_tmp') ?>");
    }
    loadData();

    //function buat mengkosong form data barang setelah di tambah ke tmp
    function EmptyData()
    {
        $("#kode_barang").val("");
        $("#nama_barang").val("");
        $("#jenis_barang").val("");
    }

    //ambil data karyawan berdasarkan nik
    // $("#nik").click(function(){
    $("#nik").change(function(){    
        var nik = $("#nik").val();
        
        $.ajax({
            url:"<?php echo site_url('admin/cari_karyawan');?>",
            type:"POST",
            data:"nik="+nik,
            cache:false,
            success:function(html){
                $("#nama").val(html);
                // document.write(html)
            }
        })
        
    });

    //show modal search barang
    $("#cari").click(function(){
        $("#myModal2").modal("show");
        //return false;  biar gk langsung ilang
    })

    //search barang
    $("#caribarang").keyup(function(){
        var caribarang = $('#caribarang').val();

         $.ajax({
            url:"<?php echo site_url('admin/cari_barang');?>",
            type:"POST",
            data:"caribarang="+caribarang,
            cache:false,
            success:function(hasil){
                $("#tampilbarang").html(hasil);
                
            }
        })
        
    })


    //tambah barang dari modal ke form
    
    // $(".tambah").live("click", function(){
    $('body').on('click', '.tambah', function(){
        
        var kode_barang = $(this).attr("kode_barang");
        var nama_barang     = $(this).attr("nama_barang");
        var jenis_barang = $(this).attr("jenis_barang");
        
        $("#kode_barang").val(kode_barang);
        $("#nama_barang").val(nama_barang);
        $("#jenis_barang").val(jenis_barang);

        $("#myModal2").modal("hide");
        //console.log(kode_barang);
       
    });


    //event keypress cari kode
    $("#kode_barang").keypress(function(){
        
    
        if(event.which == 13) {
            var kode_barang = $("#kode_barang").val();

            $.ajax({
                url:"<?php echo site_url('admin/cari_kode_barang');?>",
                type:"POST",
                data:"kode_barang="+kode_barang,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    
                   data = hasil.split("|");
                   if(data==0) {
                       alert("Kode Barang " + kode_barang + " Tidak Ada");
                       $("#nama_barang").val("");
                       $("#jenis_barang").val("");
                   }
                   else{
                       $("#nama_barang").val(data[0]);
                       $("#jenis_barang").val(data[1]);
                       $("#tambah_barang").focus();
                   }

                   //console.log(data);
                }
            })
            
        } 

    }) //end event keypress

    //tambah_barang ke tmp
    $("#tambah_barang").click(function(){
        
        var kode_barang = $("#kode_barang").val();
        var nama_barang     = $("#nama_barang").val();
        var jenis_barang = $("#jenis_barang").val();

        if(kode_barang == "") {
            alert("Kode " + kode_barang + " Masih Kosong ");
            $("#kode_barang").focus();
            return false;
        }
        else if(nama_barang == ""){
            alert("Nama " + nama_barang + " Masih Kosong ");
            return false;
        }
        else{
            $.ajax({
                url:"<?php echo site_url('admin/save_tmp');?>",
                type:"POST",
                data:"kode_barang="+kode_barang+"&nama_barang="+nama_barang+"&jenis_barang="+jenis_barang,
                cache:false,
                success:function(hasil){
                    loadData();
                    EmptyData();
                   
                }
            })
        }

    }) //end tambahbarang 

    // //delete tabel tmp
    $('body').on('click', '.hapus', function(){
        
        //ambil dulu atribute kodenya
        var kode_barang = $(this).attr('kode_barang');
        $.ajax({
            url:"<?php echo site_url('admin/hapus_tmp');?>",
            type:"POST",
            data:"kode_barang="+kode_barang,
            cache:false,
            success:function(hasil){
                // alert(hasil);
                loadData();
            }
        })
        

    }); //end delete table tmp

    //simpan transaksi 
    //$("#simpan").click(function(){
    $('body').on('click', '#simpan', function(){    
        
        //tampung data dari form buat dikirim 
        var id_transaksi = $("#id_transaksi").val();
        var tgl_pinjam   = $("#tgl_pinjam").val();
        var tgl_kembali  = $("#tgl_kembali").val();
        var nik          = $("#nik").val();
        var jumlah_tmp   = parseInt($("#jumlahTmp").val(), 10);

        //cek nik jika kosong 
        if(nik == "") {
            alert("Pilih NIK Karyawan");
            $("#nik").focus();
            return false;
        }
        else if(jumlah_tmp == 0){
            alert("Pilih barang yang di pinjam");
            return false;
        }
        else{
            $.ajax({
                url:"<?php echo site_url('admin/simpan_peminjaman');?>",
                type:"POST",
                data:"id_transaksi="+id_transaksi+"&tgl_pinjam="+tgl_pinjam+"&tgl_kembali="+tgl_kembali+
                "&nik="+nik+"&jumlah_tmp="+jumlah_tmp,
                cache:false,
                success:function(hasil){
                  //console.log(hasil);
                 
                  alert("Transaksi Peminjaman Berhasil");
                  
                  location.reload();
                }
            })
        }
        
    })
});

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






</script>
</body>
</html>
