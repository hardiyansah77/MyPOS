			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo base_url('coba/index');?>">Dashboard</a>
							</li>
							<li class="active">Dormitory</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>
						<title>POS System | Data Dormitory | Form edit data dormitory</title>
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

						<div class="page-header">
							<h1>
								Data Dormitory
								<small>
									<i class="ace-icon fa fa-angle-double-right"> Form edit data dormitory</i>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php foreach ($tbl_dormitory  as $data): ?>
								<form action="<?php echo base_url('coba/upadteDataDormitory');?>" method="post" class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Floor </label>

										<div class="col-sm-4">
											<div>
												<select class="form-control" name="floor" id="form-field-select-1" required>
													<option value="<?php echo $data->floor ?>"><?php echo $data->floor ?></option>
													<option value="">>>Select floor<<</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Type </label>

										<div class="col-sm-4">
											<div>
												<select class="form-control" name="type" id="form-field-select-1" required>
													<option value="<?php echo $data->type ?>"><?php echo $data->type ?></option>
													<option value="">>>Select type<<</option>
													<option value="Suite">Suite</option>
													<option value="Family">Family</option>
													<option value="Deluxe A">Deluxe A</option>
													<option value="Deluxe B">Deluxe B</option>
													<option value="Superior A">Superior A</option>
													<option value="Superior B">Superior B</option>
													<option value="Superior C">Superior C</option>
													<option value="Standard A">Standard A</option>
													<option value="Standard B">Standard B</option>
													<option value="Standard C">Standard C</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bed</label>

										<div class="col-sm-9">
											<div class="radio">
											<?php 
												$bed1 = "";
												$bed2 = "";
												$bed3 = "";
												$bed4 = "";
													if($data->bed == "1"){
															$bed1 = "checked";
														} else if($data->bed == "2"){
															$bed2 = "checked";
														} else if($data->bed == "3"){
															$bed3 = "checked";
														} else if($data->bed == "4") {
															$bed4 = "checked";
														}
											?>
													<label>
														<input name="bed" value="1" type="radio" <?= $bed1; ?> required class="ace" />
														<span class="lbl" > 1 </span>
													</label>
													<label>
														<input name="bed" value="2" type="radio" <?= $bed2; ?> required class="ace" />
														<span class="lbl" > 2 </span>
													</label>
													<label>
														<input name="bed" value="3" type="radio" <?= $bed3; ?> required class="ace" />
														<span class="lbl" > 3 </span>
													</label>
													<label>
														<input name="bed" value="4" type="radio" <?= $bed4; ?> required class="ace" />
														<span class="lbl" > 4 </span>
													</label>
												</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Room Size </label>

										<div class="col-sm-9">
											<input type="text" name="room_size" value="<?php echo $data->room_size ?>" id="form-field-1" placeholder="Input room size" required class="col-xs-10 col-sm-5" />
											<input type="hidden" name="id" value="<?php echo $data->id ?>" id="form-field-1" placeholder="Input room size" required class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Room Quantity </label>

										<div class="col-sm-1">
											<input type="text" name="qty_male" value="<?php echo $data->qty_male ?>" id="form-field-1" placeholder="Male" required class="col-xs-1 col-sm-12" />
										</div>
										<div class="col-sm-1">
											<input type="text" name="qty_female" value="<?php echo $data->qty_female ?>" id="form-field-1" placeholder="Female" required class="col-xs-1 col-sm-12" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Facilities </label>
										<div class="col-sm-9">
												<textarea id="form-field-1" name="facilities"  placeholder="Input facilities" required class="col-xs-10 col-sm-5"><?php echo $data->facilities ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Price </label>

										<div class="col-sm-9">
											<input type="text" name="price" value="<?php echo $data->price ?>" id="form-field-1" placeholder="Input price" required class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<input class="btn btn-info" type="submit" name="upload" value="Submit"></input>
											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
								</form>
								<?php endforeach ?>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->