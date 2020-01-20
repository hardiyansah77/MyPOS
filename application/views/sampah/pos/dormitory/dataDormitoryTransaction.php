			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo base_url('coba/index');?>">Dashboard</a>
							</li>
							<li class="active">Dormitory Transaction</li>
						</ul><!-- /.breadcrumb -->
					</div>
				<title>POS System | Data Dormitory Transaction</title>
					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<div class="page-header">
											<h1>
												Data Dormitory Transaction
												<small>
													<i class="ace-icon fa fa-angle-double-right"></i>
												</small>
											</h1>
										</div>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-9 col-sm-6 pricing-box">
										<div class="widget-box widget-color-blue">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Information</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<ul class="list-unstyled spaced2">
														<li>
															<i class="ace-icon fa fa-check green"></i>
															Total jumlah kamar laki-laki yang tersedia  : <b><?php echo ($ttlMale->{"sum(qty_male)"} - $orderMale->{"count(id_transaction)"}); ?> / <?php echo $ttlMale->{"sum(qty_male)"};?></b>
														</li>

														<li>
															<i class="ace-icon fa fa-check green"></i>
															Total jumlah kamar perempuan yang tersedia	: <b><?php echo ($ttlFemale->{"sum(qty_female)"} - $orderFemale->{"count(id_transaction)"}); ?> / <?php echo $ttlFemale->{"sum(qty_female)"};?></b>
														</li>

														<li>
															<i class="ace-icon fa fa-check green"></i> 
															Total jumlah semua kamar yang tersedia 	: <b><?php echo (($ttlMale->{"sum(qty_male)"} + $ttlFemale->{"sum(qty_female)"}) - $orderAll->{"count(id_transaction)"}); ?> / <?php echo ($ttlMale->{"sum(qty_male)"} + $ttlFemale->{"sum(qty_female)"});?></b>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div><br><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div>
									<a href="<?php echo base_url('coba/formAddDataDormitoryTransaction');?>" class="btn btn-white btn-info btn-bold"><i class="fa glyphicon-plus "></i> Add New Data Transaction</a><br><br>
										
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
													}
												}
											?>
										<div class="table-header">
											Results for "Data Dormitory"
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															Name
														</th>
														<th>Parent/Guardian of</th>
														<th>Class</th>
														<th class="hidden-480">Room Type</th>

														<th>
															<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
															Room Number
														</th>
														<th class="hidden-480">Price</th>

														<th></th>
													</tr>
												</thead>

												<tbody>
												<?php $no=1; foreach ($dtDormitoryTransaction  as $r): ?>
													<tr>
													<td>
															<a href="#"><?=$r['siswa_nopin'] ?></a>
														</td>
														<td class="center">
															<?=$r['parent'] ?>
														</td>
														<td><?=$r['class'] ?></td>
														<td class="hidden-480"><?=$r['type'] ?></td>
														<td><?=$r['floor'] ?><?=$r['room_number'] ?></td>

														<td class="hidden-480">
															<span>Rp.<?=number_format($r['price']) ?></span>
														</td>

														<td><center>
															<div class="hidden-sm hidden-xs action-buttons">

																<a class="green" href="<?=base_url();?>coba/editDataDormitoryTransaction/<?=$r['id_transaction'] ?>">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red" href="<?=base_url();?>coba/deleteDataDormitoryTransaction/<?=$r['id_transaction'] ?>">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div></center>
														</td>
													</tr>
													<?php endforeach ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->