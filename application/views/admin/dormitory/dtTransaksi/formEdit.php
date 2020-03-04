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
        <li><a href="#">Dormitory Transaction</a></li>
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
              <h3 class="box-title">Data Dormitory Transaction</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url('admin/updateDormitoryTransaction');?>" method="post" class="form-horizontal">
              <div class="box-body">
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Level</label>

                  <div class="col-sm-5">
                    <select name="jenjang" id="jenjang" class="form-control">
					<?php foreach ($data1['tbl_dormitory_transaction']  as $r): ?><option value="<?=$r->jenjang ?>"><?= strtoupper($r->jenjang) ?></option><?php endforeach ?>
                    <option> -- Select level -- </option>
                    <?php foreach ($dtDormitoryTransaction  as $r): ?>
						<option value="<?=$r['unit_name'] ?>"><?=$r['unit_name'] ?></option>
					<?php endforeach ?>
                  </select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Name</label>

                  <div class="col-sm-5">
                    <select class="form-control" name="siswa_nopin" required>
						<?php foreach ($data1['tbl_dormitory_transaction']  as $r): ?><option value="<?=$r->siswa_nopin ?>"><?=$r->siswa_nopin ?></option><?php endforeach ?>
					</select>
					<input type="hidden" id ="gender" readonly name="gender">
					<input type="hidden" id ="nama" readonly name="nama">
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Parent / Guardian of</label>

                  <div class="col-sm-5">
					<?php foreach ($data1['tbl_dormitory_transaction']  as $r): ?>
						<input type="text" name="parent" value="<?=$r->parent ?>" id ="parent" class="form-control" placeholder="Parent / Guardian of ..." readonly>
						<input type="hidden" readonly name="id_transaction" value="<?=$r->id_transaction ?>" />
					<?php endforeach ?>
				</div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Class</label>

                  <div class="col-sm-5">
					<?php foreach ($data1['tbl_dormitory_transaction']  as $r): ?><input type="text" name="class" value="<?=$r->class ?>" id ="class" class="form-control" placeholder="Class ..." readonly><?php endforeach ?>
                  </div>
                </div>
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Room Number</label>

                  <div class="col-sm-5">
                    <?php foreach ($data1['tbl_dormitory_transaction']  as $r): ?><input type="text" name="room_number" value="<?=$r->room_number ?>" class="form-control" id="inputEmail3" placeholder="Input room number ..."><?php endforeach ?>
                  </div>
                </div>        
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Floor</label>

                  <div class="col-sm-5">
                    <select name="floor" class="form-control">
					<?php foreach ($data1['tbl_dormitory_transaction']  as $r): ?><option value="<?=$r->floor ?>"><?= $r->floor ?></option><?php endforeach ?>
                    <option> -- Select floor -- </option>
                    <?php foreach ($dtFloor  as $r): ?>
						<option value="<?=$r['floor'] ?>"><?=$r['floor'] ?></option>
					<?php endforeach ?>
                  </select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Room  Type</label>

                  <div class="col-sm-5">
                    <select class="form-control" name="type" id="type" required>
						<?php foreach ($data1['tbl_dormitory_transaction']  as $r): ?><option value="<?=$r->type ?>"><?= $r->type ?></option><?php endforeach ?>
					</select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Price</label>

                  <div class="col-sm-5">
					<?php foreach ($data1['tbl_dormitory_transaction']  as $r): ?><input type="text" name="price" id ="price" value="<?=$r->price ?>" class="form-control" placeholder="Input price ..." readonly><?php endforeach ?>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			  <div class="col-sm-offset-3 col-sm-10">
                <a href="<?php echo base_url('admin/dtDormitoryTransaction');?>" type="submit" class="btn btn-default">Batal</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
            }
        });


    }else{
        $('select[name="siswa_nopin"]').empty();
    }
});

$( "select[name='floor']" ).change(function () {
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
});

$( "select[name='type']" ).change(function () {
    var typeID = $(this).val();


    if(typeID) {


        $.ajax({
            url: "<?php echo base_url('ajax/getPrice');?>",
            dataType: 'Json',
            data: {'type':typeID},
            success: function(data) {
				$('#price').val(data)
				//console.log(data);
            }
        });


    }else{
        $('select[name="price"]').empty();
    }
});

		</script>
</body>
</html>
