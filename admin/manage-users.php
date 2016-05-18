<?php include 'view/header.php'; ?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<!-- Apple devices fullscreen -->
<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

<title>GIT BOX - Manage Users</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Bootstrap responsive -->
<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
<!-- jQuery UI -->
<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery-ui.css">
<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
<!-- PageGuide -->
<link rel="stylesheet" href="css/plugins/pageguide/pageguide.css">
<!-- Fullcalendar -->
<link rel="stylesheet" href="css/plugins/fullcalendar/fullcalendar.css">
<link rel="stylesheet" href="css/plugins/fullcalendar/fullcalendar.print.css" media="print">
<!-- Tagsinput -->
<link rel="stylesheet" href="css/plugins/tagsinput/jquery.tagsinput.css">
<!-- chosen -->
<link rel="stylesheet" href="css/plugins/chosen/chosen.css">
<!-- multi select -->
<link rel="stylesheet" href="css/plugins/multiselect/multi-select.css">
<!-- timepicker -->
<link rel="stylesheet" href="css/plugins/timepicker/bootstrap-timepicker.min.css">
<!-- colorpicker -->
<link rel="stylesheet" href="css/plugins/colorpicker/colorpicker.css">
<!-- Datepicker -->
<link rel="stylesheet" href="css/plugins/datepicker/datepicker.css">
<!-- Daterangepicker -->
<link rel="stylesheet" href="css/plugins/daterangepicker/daterangepicker.css">
<!-- Plupload -->
<link rel="stylesheet" href="css/plugins/plupload/jquery.plupload.queue.css">
<!-- select2 -->
<link rel="stylesheet" href="css/plugins/select2/select2.css">
<!-- icheck -->
<link rel="stylesheet" href="css/plugins/icheck/all.css">
<!-- Elfinder -->
<link rel="stylesheet" href="css/plugins/elfinder/elfinder.min.css">
<link rel="stylesheet" href="css/plugins/elfinder/theme.css">
<!-- Theme CSS -->
<link rel="stylesheet" href="css/style.css">
<!-- Color CSS -->
<link rel="stylesheet" href="css/themes.css">


<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Nice Scroll -->
<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
<!-- imagesLoaded -->
<script src="js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
<!-- jQuery UI -->
<script src="js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
<script src="js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
<script src="js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
<script src="js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
<script src="js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
<script src="js/plugins/jquery-ui/jquery.ui.selectable.min.js"></script>
<script src="js/plugins/jquery-ui/jquery.ui.droppable.min.js"></script>
<script src="js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
<script src="js/plugins/jquery-ui/jquery.ui.spinner.js"></script>
<script src="js/plugins/jquery-ui/jquery.ui.slider.js"></script>

<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Bootbox -->
<script src="js/plugins/bootbox/jquery.bootbox.js"></script>
<!-- Masked inputs -->
<script src="js/plugins/maskedinput/jquery.maskedinput.min.js"></script>
<!-- TagsInput -->
<script src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<!-- Datepicker -->
<script src="js/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Daterangepicker -->
<script src="js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="js/plugins/daterangepicker/moment.min.js"></script>
<!-- Timepicker -->
<script src="js/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Colorpicker -->
<script src="js/plugins/colorpicker/bootstrap-colorpicker.js"></script>
<!-- Chosen -->
<script src="js/plugins/chosen/chosen.jquery.min.js"></script>
<!-- MultiSelect -->
<script src="js/plugins/multiselect/jquery.multi-select.js"></script>
<!-- CKEditor -->
<script src="js/plugins/ckeditor/ckeditor.js"></script>
<!-- PLUpload -->
<script src="js/plugins/plupload/plupload.full.js"></script>
<script src="js/plugins/plupload/jquery.plupload.queue.js"></script>
<!-- Custom file upload -->
<script src="js/plugins/fileupload/bootstrap-fileupload.min.js"></script>
<script src="js/plugins/mockjax/jquery.mockjax.js"></script>
<!-- select2 -->
<script src="js/plugins/select2/select2.min.js"></script>
<!-- icheck -->
<script src="js/plugins/icheck/jquery.icheck.min.js"></script>
<!-- complexify -->
<script src="js/plugins/complexify/jquery.complexify-banlist.min.js"></script>
<script src="js/plugins/complexify/jquery.complexify.min.js"></script>
<!-- Mockjax -->
<script src="js/plugins/mockjax/jquery.mockjax.js"></script>
<!-- Elfinder -->
<script src="js/plugins/elfinder/elfinder.min.js"></script>

<!-- Theme framework -->
<script src="js/eakroko.min.js"></script>
<!-- Theme scripts -->
<script src="js/application.min.js"></script>
<!-- Just for demonstration -->
<script src="js/demonstration.min.js"></script>

<!--[if lte IE 9]>
	<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
	<script>
		$(document).ready(function() {
			$('input, textarea').placeholder();
		});
	</script>
	<![endif]-->

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

</head>
<body>
<script type="text/javascript">
	function showMedia(){
		document.getElementById("modal-user").style.display="block";
	}
</script>
	<div id="media-manager" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:800px;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Media Manager</h3>
		</div>
		<div class="modal-body nopadding"><div class="file-manager"></div></div>
	</div>
	<?php top_navigation(); ?>
	<div class="container-fluid" id="content">
		<?php left_sidebar(); ?>
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<?php
					if(isset($_GET['action']) && $_GET['action']=='edit'){
						$page_action = 'Edit User';
						$users_data = DB::select_query('users',array('id=' => $_GET['id']));
						foreach($users_data as $user_data){
							extract($user_data);
						}
					} else {
						$page_action = 'Add New User';
					}
					?>
					<div class="pull-left"><h1><?php echo $page_action; ?></h1></div>
					<?php sub_header(); ?>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li><a href="dashboard.php">Home</a><i class="icon-angle-right"></i></li>
						<li><a href="users.php">Users</a><i class="icon-angle-right"></i></li>
						<li><a href="manage-users.php">Add User</a></li>
					</ul>
					<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title"><h3><i class="icon-th-list"></i> <?php echo $page_action; ?></h3></div>
							<div class="box-content nopadding">
								<form method="POST" class='form-horizontal form-bordered form-wysiwyg ' enctype='multipart/form-data'>
									<div class="control-group">
										<label for="menu_name" class="control-label">Username</label>
										<div class="controls">
											<input type="text" name="username" id="username" value="<?php if(isset($_GET['id'])) echo $username; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
										</div>
									</div>
									<div class="control-group">
										<label for="menu_name" class="control-label">Email</label>
										<div class="controls">
											<input type="text" name="email" id="email" value="<?php if(isset($_GET['id'])) echo $email; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
										</div>
									</div>
									<div class="control-group">
										<label for="menu_name" class="control-label">Password</label>
										<div class="controls">
											<input type="text" name="password" id="password" value="<?php if(isset($_GET['id'])) echo $password; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
										</div>
									</div>
									<div class="control-group">
										<label for="menu_name" class="control-label">First Name</label>
										<div class="controls">
											<input type="text" name="first_name" id="first_name" value="<?php if(isset($_GET['id'])) echo $first_name; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
										</div>
									</div>
									<div class="control-group">
										<label for="menu_name" class="control-label">Last Name</label>
										<div class="controls">
											<input type="text" name="last_name" id="last_name" value="<?php if(isset($_GET['id'])) echo $last_name; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">State</label>
										<div class="controls">
											<div class="input-xlarge">
												<select name="state_id" id="state_id" class='chosen-select' onchange="load_options(this.value,'state');">
													<option value=""></option>
													<?php 
													$states = get_states();
													foreach($states as $state) {
													?>
													<option value="<?php echo $state['id'];?>" <?php if(isset($_GET['id']) && $state_id==$state['id']) echo ' selected ';  ?>><?php echo @$state['name'];?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">City</label>
										<div class="controls">
											<div class="input-xlarge">
												<select name="city_id"  id="city_id" class='chosen-select' onchange="load_options(this.value,'city');">
													<option value=""></option>
													<?php 
													$cities = get_cities();
													foreach($cities as $city) {
													?>
													<option value="<?php echo $city['id'];?>" <?php if(isset($_GET['id']) && $city_id==$city['id']) echo ' selected ';  ?>><?php echo @$city['name'];?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Pincode</label>
										<div class="controls">
											<input type="text" name="pincode" id="pincode" value="<?php if(isset($_GET['id'])) echo $pincode; ?>" class="input-small" data-rule-required="true" data-rule-minlength="2">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Date of Birth</label>
										<div class="controls">
											<input type="text" name="dob" id="dob" class="input-medium datepick" value="<?php if(isset($_GET['id'])) echo $dob; ?>">
											<span class="help-block">Birth date of user.</span>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Gender</label>
										<div class="controls">
											<div class="input-large">
												<select name="gender" id="gender" class='chosen-select'>
													<option value=""></option>
													<option value="Male" <?php if(isset($_GET['id']) && $gender=='Male') echo ' selected ';  ?>>Male</option>
													<option value="Female" <?php if(isset($_GET['id']) && $gender=='Female') echo ' selected ';  ?>>Female</option>
												</select>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="menu_name" class="control-label">Mobile</label>
										<div class="controls">
											<input type="text" name="mobile" id="mobile" value="<?php if(isset($_GET['id'])) echo $mobile; ?>" class="input-medium" data-rule-required="true" data-rule-minlength="2">
										</div>
									</div>
									<div class="control-group">
										<label for="textarea" class="control-label">Address</label>
										<div class="controls">
											<textarea name="address" id="address" rows="5" style="width:300px;" class="input-block-level" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $address; ?></textarea>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Status</label>
										<div class="controls">
											<div class="check-demo-col">
												<div class="check-line">
													<input type="radio" id="status" name="status" class='icheck-me' data-skin="square" data-color="blue" value="1" <?php if(isset($_GET['id']) && $status==1) echo ' checked ';  ?>> <label class='inline' for="status">Enable</label>
												</div>
												<div class="check-line">
													<input type="radio" id="status" name="status" class='icheck-me' data-skin="square" data-color="blue" value="0" <?php if(isset($_GET['id']) && $status==0) echo ' checked ';  ?>> <label class='inline' for="status">Disable</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-primary" name="save">Save changes</button>
										<button type="button" class="btn" onClick="history.go(-1);">Cancel</button>
									</div>
								</form>
							</div>
							<?php
							if(isset($_POST['save'])){
								if(isset($_GET['action'])) {
									$values = array(
										'username' => $_POST['username'],
										'email' => $_POST['email'],
										'password' => $_POST['password'],
										'first_name' => $_POST['first_name'],
										'last_name' => $_POST['last_name'],
										'dob' => $_POST['dob'],
										'gender' => $_POST['gender'],
										'mobile' => $_POST['mobile'],
										'state_id' => $_POST['state_id'],
										'city_id' => $_POST['city_id'],
										'pincode' => $_POST['pincode'],
										'address' => $_POST['address'],
										'status' => $_POST['status'],
									);
									DB::update_query('users',$values,array( 'id=' => $_GET['id'] ));

								} else {
									$values = array(
										'date' => date('Y-m-d'),
										'username' => $_POST['username'],
										'email' => $_POST['email'],
										'password' => $_POST['password'],
										'first_name' => $_POST['first_name'],
										'last_name' => $_POST['last_name'],
										'dob' => $_POST['dob'],
										'gender' => $_POST['gender'],
										'mobile' => $_POST['mobile'],
										'state_id' => $_POST['state_id'],
										'city_id' => $_POST['city_id'],
										'pincode' => $_POST['pincode'],
										'address' => $_POST['address'],
										'status' => $_POST['status'],
									);
									DB::insert_query('users',$values);
								}
								Helper::redirect("users.php");
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include 'view/footer.php'; ?>