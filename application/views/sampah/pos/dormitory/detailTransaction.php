			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo base_url('coba/index');?>">Dashboard</a>
							</li>
							<li class="active">Otorisasi Dormitory Transaction</li>
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
								Otorisasi Dormitory Transaction
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Detail Transaction
								</small>
							</h1>
						</div><!-- /.page-header -->
				<?php foreach ($tbl_dormitory_transaction  as $data): ?>
					<form action="<?php echo base_url();?>coba/actionOtorisasiDormitoryTransaction/<?php echo $data->id_transaction ?>" method="post">	
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->								
								<div>
									<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-9">
											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> ID Transaction </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $data->id_transaction ?></span>
														<input type="hidden" name="id_transaction" value="<?php echo $data->id_transaction ?>"/>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Level </div>

													<div class="profile-info-value">
														<span class="editable" id="age"><?php echo $data->jenjang ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Name </div>

													<div class="profile-info-value">
														<span class="editable" id="age"><?php echo $data->siswa_nopin ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Gender </div>

													<div class="profile-info-value">
														<span class="editable" id="signup"><?php echo $data->gender ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Class </div>

													<div class="profile-info-value">
														<span class="editable" id="login"><?php echo $data->class ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Parent/Guardian of </div>

													<div class="profile-info-value">
														<span class="editable" id="about"><?php echo $data->parent ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Room Type </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $data->type ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Room Number </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $data->floor ?><?php echo $data->room_number ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Price </div>

													<div class="profile-info-value">
														<span class="editable" id="username">Rp. <?php echo number_format($data->price) ?></span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Order Time </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $data->created_date ?></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<input class="btn btn-info" type="submit" name="upload" value="Approve"></input>
								&nbsp; &nbsp; &nbsp;
								<a href="<?php echo base_url('coba/otorisasiDormitoryTransaction');?>" class="btn">
									Back
								</a>
							</div>
						</div>
					</form>
				<?php endforeach ?>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->