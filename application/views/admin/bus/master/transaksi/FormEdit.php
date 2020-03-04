<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Edit
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Transaksi Bus</a></li>
        <li class="active">Form Edit</li>
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
              <h3 class="box-title">Transaksi Bus</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url('admin/updateTransaksiBus');?>" method="post" class="form-horizontal">
              <div class="box-body">
        <h4 class="box-title">Data 1</h4>
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Level</label>

                  <div class="col-sm-5">
                    <select name="jenjang" id="jenjang" class="form-control">
					<?php foreach ($data1['tbl_transaksi_bus']  as $r): ?><option value="<?=$r->jenjang ?>"><?= strtoupper($r->jenjang) ?></option><?php endforeach ?>
                    <option> -- Select level -- </option>
                    <?php foreach ($dtTransaksiBus  as $r): ?>
						<option value="<?=$r['unit_name'] ?>"><?=$r['unit_name'] ?></option>
					<?php endforeach ?>
                  </select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Name</label>

                  <div class="col-sm-5">
                    <select class="form-control" name="siswa_nopin" required>
						<?php foreach ($data1['tbl_transaksi_bus']  as $r): ?><option value="<?=$r->siswa_nopin ?>"><?=$r->nama ?></option><?php endforeach ?>
					</select>
					<input type="hidden" id ="gender" readonly name="gender">
					<input type="hidden" id ="nama" readonly name="nama">
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Parent / Guardian of</label>

                  <div class="col-sm-5">
					<?php foreach ($data1['tbl_transaksi_bus']  as $r): ?>
						<input type="text" name="parent" value="<?=$r->parent ?>" id ="parent" class="form-control" placeholder="Parent / Guardian of ..." readonly>
						<input type="hidden" readonly name="id_transaksi" value="<?=$r->id_transaksi ?>" />
					<?php endforeach ?>
				</div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Class</label>

                  <div class="col-sm-5">
					<?php foreach ($data1['tbl_transaksi_bus']  as $r): ?>
            <input type="text" name="class" value="<?=$r->class ?>" id ="class" class="form-control" placeholder="Class ..." readonly>
          <?php endforeach ?>
                  </div>
                </div>
                <!--1-->
        <h4 class="box-title">Data 2</h4>
        <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Level</label>

                  <div class="col-sm-5">
                    <select name="jenjang2" id="jenjang2" class="form-control">
          <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?><option value="<?=$r->jenjang2 ?>"><?= strtoupper($r->jenjang2) ?></option><?php endforeach ?>
                    <option> -- Select level -- </option>
                    <?php foreach ($dtTransaksiBus  as $r): ?>
            <option value="<?=$r['unit_name'] ?>"><?=$r['unit_name'] ?></option>
          <?php endforeach ?>
                  </select>
                  </div>
                </div>
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Name</label>

                  <div class="col-sm-5">
                    <select class="form-control" name="siswa_nopin2" required>
            <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?><option value="<?=$r->siswa_nopin2 ?>"><?=$r->nama2 ?></option>
            <?php endforeach ?>
          </select>
          <input type="hidden" id ="gender2" readonly name="gender2">
          <input type="hidden" id ="nama2" readonly name="nama2">
                  </div>
                </div>
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Parent / Guardian of</label>

                  <div class="col-sm-5">
          <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?>
            <input type="text" name="parent2" value="<?=$r->parent2 ?>" id ="parent2" class="form-control" placeholder="Parent / Guardian of ..." readonly>
            <input type="hidden" readonly name="id_transaksi" value="<?=$r->id_transaksi ?>" />
          <?php endforeach ?>
        </div>
                </div>
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Class</label>

                  <div class="col-sm-5">
          <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?>
            <input type="text" name="class2" value="<?=$r->class2 ?>" id ="class2" class="form-control" placeholder="Class ..." readonly>
          <?php endforeach ?>
                  </div>
                </div>
                <!--2-->
        <h4 class="box-title">Data 3</h4>
        <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Level</label>

                  <div class="col-sm-5">
                    <select name="jenjang3" id="jenjang3" class="form-control">
          <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?><option value="<?=$r->jenjang3 ?>"><?= strtoupper($r->jenjang3) ?></option><?php endforeach ?>
                    <option> -- Select level -- </option>
                    <?php foreach ($dtTransaksiBus  as $r): ?>
            <option value="<?=$r['unit_name'] ?>"><?=$r['unit_name'] ?></option>
          <?php endforeach ?>
                  </select>
                  </div>
                </div>
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Name</label>

                  <div class="col-sm-5">
                    <select class="form-control" name="siswa_nopin3" required>
            <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?><option value="<?=$r->siswa_nopin3 ?>"><?=$r->nama3 ?></option><?php endforeach ?>
          </select>
          <input type="hidden" id ="gender3" readonly name="gender3">
          <input type="hidden" id ="nama3" readonly name="nama3">
                  </div>
                </div>
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Parent / Guardian of</label>

                  <div class="col-sm-5">
          <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?>
            <input type="text" name="parent3" value="<?=$r->parent3 ?>" id ="parent3" class="form-control" placeholder="Parent / Guardian of ..." readonly>
            <input type="hidden" readonly name="id_transaksi" value="<?=$r->id_transaksi ?>" />
          <?php endforeach ?>
        </div>
                </div>
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Class</label>

                  <div class="col-sm-5">
          <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?>
            <input type="text" name="class3" value="<?=$r->class3 ?>" id ="class3" class="form-control" placeholder="Class ..." readonly>
          <?php endforeach ?>
                  </div>
                </div>
                <!--3-->
        <h4 class="box-title">Data 4</h4>
        <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Level</label>

                  <div class="col-sm-5">
                    <select name="jenjang4" id="jenjang4" class="form-control">
          <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?><option value="<?=$r->jenjang4 ?>"><?= strtoupper($r->jenjang4) ?></option><?php endforeach ?>
                    <option> -- Select level -- </option>
                    <?php foreach ($dtTransaksiBus  as $r): ?>
            <option value="<?=$r['unit_name'] ?>"><?=$r['unit_name'] ?></option>
          <?php endforeach ?>
                  </select>
                  </div>
                </div>
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Name</label>

                  <div class="col-sm-5">
                    <select class="form-control" name="siswa_nopin4" required>
            <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?><option value="<?=$r->siswa_nopin4 ?>"><?=$r->nama4 ?></option><?php endforeach ?>
          </select>
          <input type="hidden" id ="gender4" readonly name="gender4">
          <input type="hidden" id ="nama4" readonly name="nama4">
                  </div>
                </div>
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Parent / Guardian of</label>

                  <div class="col-sm-5">
          <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?>
            <input type="text" name="parent4" value="<?=$r->parent4 ?>" id ="parent4" class="form-control" placeholder="Parent / Guardian of ..." readonly>
            <input type="hidden" readonly name="id_transaksi" value="<?=$r->id_transaksi ?>" />
          <?php endforeach ?>
        </div>
                </div>
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Class</label>

                  <div class="col-sm-5">
          <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?>
            <input type="text" name="class4" value="<?=$r->class4 ?>" id ="class4" class="form-control" placeholder="Class ..." readonly>
          <?php endforeach ?>
                  </div>
                </div>
                <!--4-->
        <h4 class="box-title">Data 5</h4>
        <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Level</label>

                  <div class="col-sm-5">
                    <select name="jenjang5" id="jenjang5" class="form-control">
          <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?><option value="<?=$r->jenjang5 ?>"><?= strtoupper($r->jenjang5) ?></option><?php endforeach ?>
                    <option> -- Select level -- </option>
                    <?php foreach ($dtTransaksiBus  as $r): ?>
            <option value="<?=$r['unit_name'] ?>"><?=$r['unit_name'] ?></option>
          <?php endforeach ?>
                  </select>
                  </div>
                </div>
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Name</label>

                  <div class="col-sm-5">
                    <select class="form-control" name="siswa_nopin5" required>
            <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?><option value="<?=$r->siswa_nopin5 ?>"><?=$r->nama5 ?></option><?php endforeach ?>
          </select>
          <input type="hidden" id ="gender5" readonly name="gender5">
          <input type="hidden" id ="nama5" readonly name="nama5">
                  </div>
                </div>
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Parent / Guardian of</label>

                  <div class="col-sm-5">
          <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?>
            <input type="text" name="parent5" value="<?=$r->parent5 ?>" id ="parent5" class="form-control" placeholder="Parent / Guardian of ..." readonly>
            <input type="hidden" readonly name="id_transaksi" value="<?=$r->id_transaksi ?>" />
          <?php endforeach ?>
                  </div>
                </div>
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Class</label>

                  <div class="col-sm-5">
          <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?>
            <input type="text" name="class5" value="<?=$r->class5 ?>" id ="class5" class="form-control" placeholder="Class ..." readonly>
          <?php endforeach ?>
                  </div>
                </div>
                <!--5-->
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tipe Bus</label>

                  <div class="col-sm-5">
          <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?>
					<input type="text" name="tipe_bus" id ="tipe_bus" class="form-control" placeholder="Tipe Bus" value="<?=$r->tipe_bus ?>">
          <?php endforeach ?>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Bus</label>

                  <div class="col-sm-5">
          <?php foreach ($data1['tbl_transaksi_bus']  as $r): ?>
					<input type="text" name="nama_bus" id ="nama_bus" class="form-control" placeholder="Nama Bus"value="<?=$r->nama_bus ?>">
          <?php endforeach ?>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			  <div class="col-sm-offset-3 col-sm-10">
                <a href="<?php echo base_url('admin/dtTransaksiBus');?>" type="submit" class="btn btn-default">Batal</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<script type="text/javascript">

$( "select[name='jenjang']" ).change(function () {
    var jenjangID = $(this).val();


    if(jenjangID) {


        $.ajax({
            url: "<?php echo base_url('ajax/getNama');?>",
      //type: "POST",
            dataType: 'json',
            data: {'id':jenjangID},
        //data: "id=" + jenjangID,

             success: function(data) {
        //console.log(data);
                $('select[name="siswa_nopin"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="siswa_nopin"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            },
       error: function(jqXHR, exception) {
            //alert('[jqXHR:' + jqXHR + '], [textStatus:' + textStatus + '], [thrownError:' + errorThrown + '])');
            if (jqXHR.status === 0) {
                alert('Not connect.\n Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error.\n' + jqXHR.responseText);
            }
        },
        });


    }else{
        $('select[name="siswa_nopin"]').empty();
    }
});

$( "select[name='siswa_nopin']" ).change(function () {
    var jenjangID1 = $("select#jenjang").val();
    var siswa_nopin = $(this).val();
  console.log(jenjangID1);

    if(jenjangID1 && siswa_nopin) {


       $.ajax({
            url: "<?php echo base_url('ajax/getDt');?>",
            dataType: 'Json',
            data: {'siswa_nopin':siswa_nopin , 'jenjang':jenjangID1},
             success: function(data) {
                $('#parent').val(data.parent)
                $('#class').val(data.class)
                $('#gender').val(data.gender)
                $('#nama').val(data.nama)
           }
        });


    }else{
        $('select[name="siswa_nopin"]').empty();
    }
});

//$( "select[name='floor']" ).change(function () {
    var floorID = $(this).val();


    if(floorID) {


        $.ajax({
            url: "<?php echo base_url('ajax/getRoomType');?>",
            dataType: 'Json',
            data: {'id':floorID},
            success: function(data) {
                $('select[name="type"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="type"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });


    }else{
        $('select[name="type"]').empty();
    }
//});

//$( "select[name='type']" ).change(function () {
//    var typeID = $(this).val();


//    if(typeID) {


//        $.ajax({
//            url: "<?php echo base_url('ajax/getPrice');?>",
//            dataType: 'Json',
//            data: {'type':typeID},
//            success: function(data) {
//        $('#price').val(data)
        //console.log(data);
//            }
//        });


//    }else{
//        $('select[name="price"]').empty();
//    }
//});

//$( "select[name='room_number']" ).change(function () {
//    var room_numberID1 = $("select#room_number").val();
//  console.log(room_numberID1);

    //if(room_numberID1 && floor) {
//      if(room_numberID1) {

//        $.ajax({
//            url: "<?php echo base_url('ajax/CeKkamar');?>",
//            dataType: 'Json',
            //data: {'floor':floor , 'room_number':room_numberID1},
//            data: {'room_number':room_numberID1},
//             success: function(data) {
//                $('#facilities').val(data.facilities)
//                $('#price').val(data.price)
//                $('#type').val(data.type)
//                $('#floor').val(data.floor)
                //$('#room_number').val(data.room_number)
//                console.log(data);
//            }
//        });


//    }else{
//        $('select[name="room_number"]').empty();
//    }
//});




    </script>

<script type="text/javascript"> 
$( "select[name='jenjang2']" ).change(function () {
    var jenjangID2 = $(this).val();
    //alert('bisa kan');
    if(jenjangID2) {


        $.ajax({
            url: "<?php echo base_url('ajax/getNama2');?>",
      //type: "POST",
            dataType: 'json',
            data: {'id':jenjangID2},
        //data: "id=" + jenjangID,

             success: function(data) {
        //console.log(data);
                $('select[name="siswa_nopin2"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="siswa_nopin2"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            },
       error: function(jqXHR, exception) {
            //alert('[jqXHR:' + jqXHR + '], [textStatus:' + textStatus + '], [thrownError:' + errorThrown + '])');
            if (jqXHR.status === 0) {
                alert('Not connect.\n Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error.\n' + jqXHR.responseText);
            }
        },
        });


    }else{
        $('select[name="siswa_nopin2"]').empty();
    }
});

$( "select[name='siswa_nopin2']" ).change(function () {
    var jenjang2ID1 = $("select#jenjang2").val();
    var siswa_nopin2 = $(this).val();
  console.log(jenjang2ID1);

    if(jenjang2ID1 && siswa_nopin2) {


        $.ajax({
            url: "<?php echo base_url('ajax/getDt');?>",
            dataType: 'Json',
            data: {'siswa_nopin':siswa_nopin2 , 'jenjang':jenjang2ID1},
             success: function(data) {
                $('#parent2').val(data.parent)
                $('#class2').val(data.class)
                $('#gender2').val(data.gender)
                $('#nama2').val(data.nama)
            }
        });


    }else{
        $('select[name="siswa_nopin2"]').empty();
    }
});
</script>

<script type="text/javascript"> 
$( "select[name='jenjang3']" ).change(function () {
    var jenjangID3 = $(this).val();
    //alert('bisa kan');
    if(jenjangID3) {


        $.ajax({
            url: "<?php echo base_url('ajax/getNama2');?>",
      //type: "POST",
            dataType: 'json',
            data: {'id':jenjangID3},
        //data: "id=" + jenjangID,

             success: function(data) {
        //console.log(data);
                $('select[name="siswa_nopin3"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="siswa_nopin3"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            },
       error: function(jqXHR, exception) {
            //alert('[jqXHR:' + jqXHR + '], [textStatus:' + textStatus + '], [thrownError:' + errorThrown + '])');
            if (jqXHR.status === 0) {
                alert('Not connect.\n Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error.\n' + jqXHR.responseText);
            }
        },
        });


    }else{
        $('select[name="siswa_nopin3"]').empty();
    }
});

$( "select[name='siswa_nopin3']" ).change(function () {
    var jenjang3ID1 = $("select#jenjang3").val();
    var siswa_nopin3 = $(this).val();
  console.log(jenjang3ID1);

    if(jenjang3ID1 && siswa_nopin3) {


        $.ajax({
            url: "<?php echo base_url('ajax/getDt');?>",
            dataType: 'Json',
            data: {'siswa_nopin':siswa_nopin3 , 'jenjang':jenjang3ID1},
             success: function(data) {
                $('#parent3').val(data.parent)
                $('#class3').val(data.class)
                $('#gender3').val(data.gender)
                $('#nama3').val(data.nama)
            }
        });


    }else{
        $('select[name="siswa_nopin3"]').empty();
    }
});
</script>

<script type="text/javascript"> 
$( "select[name='jenjang4']" ).change(function () {
    var jenjangID4 = $(this).val();
    //alert('bisa kan');
    if(jenjangID4) {


        $.ajax({
            url: "<?php echo base_url('ajax/getNama2');?>",
      //type: "POST",
            dataType: 'json',
            data: {'id':jenjangID4},
        //data: "id=" + jenjangID,

             success: function(data) {
        //console.log(data);
                $('select[name="siswa_nopin4"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="siswa_nopin4"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            },
       error: function(jqXHR, exception) {
            //alert('[jqXHR:' + jqXHR + '], [textStatus:' + textStatus + '], [thrownError:' + errorThrown + '])');
            if (jqXHR.status === 0) {
                alert('Not connect.\n Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error.\n' + jqXHR.responseText);
            }
        },
        });


    }else{
        $('select[name="siswa_nopin4"]').empty();
    }
});

$( "select[name='siswa_nopin4']" ).change(function () {
    var jenjang4ID1 = $("select#jenjang4").val();
    var siswa_nopin4 = $(this).val();
  console.log(jenjang4ID1);

    if(jenjang4ID1 && siswa_nopin4) {


        $.ajax({
            url: "<?php echo base_url('ajax/getDt');?>",
            dataType: 'Json',
            data: {'siswa_nopin':siswa_nopin4 , 'jenjang':jenjang4ID1},
             success: function(data) {
                $('#parent4').val(data.parent)
                $('#class4').val(data.class)
                $('#gender4').val(data.gender)
                $('#nama4').val(data.nama)
            }
        });


    }else{
        $('select[name="siswa_nopin4"]').empty();
    }
});
</script>

<script type="text/javascript"> 
$( "select[name='jenjang5']" ).change(function () {
    var jenjangID5 = $(this).val();
    //alert('bisa kan');
    if(jenjangID5) {


        $.ajax({
            url: "<?php echo base_url('ajax/getNama2');?>",
      //type: "POST",
            dataType: 'json',
            data: {'id':jenjangID5},
        //data: "id=" + jenjangID,

             success: function(data) {
        //console.log(data);
                $('select[name="siswa_nopin5"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="siswa_nopin5"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            },
       error: function(jqXHR, exception) {
            //alert('[jqXHR:' + jqXHR + '], [textStatus:' + textStatus + '], [thrownError:' + errorThrown + '])');
            if (jqXHR.status === 0) {
                alert('Not connect.\n Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error.\n' + jqXHR.responseText);
            }
        },
        });


    }else{
        $('select[name="siswa_nopin5"]').empty();
    }
});

$( "select[name='siswa_nopin5']" ).change(function () {
    var jenjang5ID1 = $("select#jenjang5").val();
    var siswa_nopin5 = $(this).val();
  console.log(jenjang5ID1);

    if(jenjang5ID1 && siswa_nopin5) {


        $.ajax({
            url: "<?php echo base_url('ajax/getDt');?>",
            dataType: 'Json',
            data: {'siswa_nopin':siswa_nopin5 , 'jenjang':jenjang5ID1},
             success: function(data) {
                $('#parent5').val(data.parent)
                $('#class5').val(data.class)
                $('#gender5').val(data.gender)
                $('#nama5').val(data.nama)
            }
        });


    }else{
        $('select[name="siswa_nopin5"]').empty();
    }
});
</script>
</body>
</html>