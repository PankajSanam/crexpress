<?php include 'view/header.php'; ?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<!-- Apple devices fullscreen -->
<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

<title>GIT BOX - Manage Private Job</title>

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
						$page_action = 'Edit Job Posting';
						$jobs_data = DB::select_query('private_jobs',array( 'id=' => $_GET['id'] ));
						foreach($jobs_data as $job_data){
							extract($job_data);
						}
					} else {
						$page_action = 'Post New Job';
					}
					?>
					<div class="pull-left"><h1><?php echo $page_action; ?></h1></div>
					<?php sub_header(); ?>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li><a href="dashboard.php">Home</a><i class="icon-angle-right"></i></li>
						<li><a href="private-jobs.php">Private Jobs</a><i class="icon-angle-right"></i></li>
						<li><a href="post-private-job.php">Post Private Job</a></li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title"><h3><i class="icon-th-list"></i> <?php echo $page_action; ?></h3></div>
							<div class="box-content nopadding">
								<form method="POST" class='form-horizontal form-bordered form-wysiwyg ' enctype='multipart/form-data'>
									<div class="control-group">
										<label for="textfield" class="control-label">Job Category</label>
										<div class="controls">
											<div class="input-xlarge">
												<select name="job_category_id" id="job_category_id" class='chosen-select'>
													<option value=""></option>
													<?php 
													$job_categories = DB::select_query('job_categories');
													foreach($job_categories as $job_category) {
													?>
													<option value="<?php echo $job_category['id'];?>" <?php if(isset($_GET['id']) && $job_category_id==$job_category['id']) echo ' selected ';  ?>><?php echo @$job_category['name'];?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="menu_name" class="control-label">Job Title</label>
										<div class="controls">
											<input type="text" name="title" id="title" value="<?php if(isset($_GET['id'])) echo $title; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">State</label>
										<div class="controls">
											<div class="input-xlarge">
												<select name="state_id" id="state_id" class='chosen-select' onchange="load_options(this.value,'state');">
													<option value=""></option>
													<?php 
													$states = Location::states();
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
													$cities = Location::cities();
													foreach($cities as $city) {
													?>
													<option value="<?php echo $city['id'];?>" <?php if(isset($_GET['id']) && $city_id==$city['id']) echo ' selected ';  ?>><?php echo @$city['name'];?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Locality</label>
										<div class="controls">
											<div class="input-xlarge">
												<select name="locality_id" id="locality_id" class='chosen-select'>
													<option value=""></option>
													<?php 
													$localities = Location::localities();
													foreach($localities as $locality) {
													?>
													<option value="<?php echo $locality['id'];?>" <?php if(isset($_GET['id']) && $locality_id==$locality['id']) echo ' selected ';  ?>><?php echo @$locality['name'];?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="menu_name" class="control-label">Salay From</label>
										<div class="controls">
											<input type="text" name="salary_from" id="salary_from" value="<?php if(isset($_GET['id'])) echo $salary_from; ?>" class="input-medium" data-rule-required="true" data-rule-minlength="2">
											<span class="help-block">Salary per month.</span>
										</div>
									</div>
									<div class="control-group">
										<label for="menu_name" class="control-label">Salay To</label>
										<div class="controls">
											<input type="text" name="salary_to" id="salary_to" value="<?php if(isset($_GET['id'])) echo $salary_to; ?>" class="input-medium" data-rule-required="true" data-rule-minlength="2">
											<span class="help-block">Salary per month.</span>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Timings</label>
										<div class="controls">
											<div class="input-large">
												<select name="timings" id="timings" class='chosen-select'>
													<option value=""></option>
													<option value="Full Time - Day Shift" <?php if(isset($_GET['id']) && $timings=='Full Time - Day Shift') echo ' selected ';  ?>>Full Time - Day Shift</option>
													<option value="Full Time - Night Shift" <?php if(isset($_GET['id']) && $timings=='Full Time - Night Shift') echo ' selected ';  ?>>Full Time - Night Shift</option>
													<option value="Part Time - Day Shift" <?php if(isset($_GET['id']) && $timings=='Part Time - Day Shift') echo ' selected ';  ?>>Part Time - Day Shift</option>
													<option value="Part Time - Night Shift" <?php if(isset($_GET['id']) && $timings=='Part Time - Night Shift') echo ' selected ';  ?>>Part Time - Night Shift</option>
												</select>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Minimum Experience Required</label>
										<div class="controls">
											<input type="text" name="minimum_experience" id="minimum_experience" value="<?php if(isset($_GET['id'])) echo $minimum_experience; ?>" class="input-small" data-rule-required="true" data-rule-minlength="2">
											<span class="help-block">Required minimum experience.</span>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Maximum Experience Required</label>
										<div class="controls">
											<input type="text" name="maximum_experience" id="maximum_experience" value="<?php if(isset($_GET['id'])) echo $maximum_experience; ?>" class="input-small" data-rule-required="true" data-rule-minlength="2">
											<span class="help-block">Required maximum experience.</span>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Preferred Gender</label>
										<div class="controls">
											<div class="input-large">
												<select name="gender" id="gender" class='chosen-select'>
													<option value=""></option>
													<option value="Any" <?php if(isset($_GET['id']) && $gender=='Any') echo ' selected ';  ?>>Any</option>
													<option value="Male" <?php if(isset($_GET['id']) && $gender=='Male') echo ' selected ';  ?>>Male</option>
													<option value="Female" <?php if(isset($_GET['id']) && $gender=='Female') echo ' selected ';  ?>>Female</option>
												</select>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Available Positions</label>
										<div class="controls">
											<input type="text" name="vacancies" id="vacancies" value="<?php if(isset($_GET['id'])) echo $vacancies; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2">
											<span class="help-block">Available Vacancies in job posting.</span>
										</div>
									</div>
									<div class="control-group">
										<label for="textarea" class="control-label">Job Address</label>
										<div class="controls">
											<textarea name="address" id="address" rows="5" style="width:300px;" class="input-block-level" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $address; ?></textarea>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Contact Number</label>
										<div class="controls">
											<input type="text" name="contact_number" id="contact_number" value="<?php if(isset($_GET['id'])) echo $contact_number; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Expirty Date</label>
										<div class="controls">
											<input type="text" name="end_date" id="end_date" class="input-medium datepick" value="<?php if(isset($_GET['id'])) echo $end_date; ?>">
											<span class="help-block">Job ending date.</span>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Meta Title</label>
										<div class="controls">
											<input type="text" name="meta_title" id="meta_title" value="<?php if(isset($_GET['id'])) echo $meta_title; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2">
											<span class="help-block">This will be shown on pages.</span>
										</div>
									</div>
									<div class="control-group">
										<label for="textarea" class="control-label">Meta Description</label>
										<div class="controls">
											<textarea name="meta_description" id="meta_description" rows="5" style="width:300px;" class="input-block-level" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $meta_description; ?></textarea>
											<span class="help-block">Please enter meta description.</span>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Meta Keywords</label>
										<div class="controls">
											<div class="span12">
												<input type="text" name="meta_keywords" id="meta_keywords" value="<?php if(isset($_GET['id'])) echo $meta_keywords; ?>" class="tagsinput" value="tutorial,education" data-rule-required="true" data-rule-minlength="2">
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Featured Image</label>
										<div class="controls">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
													<?php 
													if(isset($_GET['id']) && $featured_image!='') {
													?>
													<img src="../uploads/privatejobs/<?php echo $featured_image; ?>" />
													<?php
													} else {
													?>
													<img src="img/no_image.gif" />
													<?php } ?>
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width:200px; max-height:150px; line-height:20px;"></div>
												<div>
													<span class="btn btn-file">
														<span class="fileupload-new">Select image</span>
														<span class="fileupload-exists">Change</span>
														<input type="file" name='featured_image' />
													</span>
													<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
													<?php if(isset($featured_image) AND $featured_image!='') { ?>
													<input class="btn" type="submit" name="remove_image" value="Remove Image" />
													<?php } ?>
													<?php
													if(isset($_POST['remove_image'])){
														$values = array( 'featured_image' => ''	);
														DB::update_query('private_jobs',$values,array( 'id=' => $_GET['id'] ));
														$url ='post-private-job.php?action=edit&id='.$_GET['id'];
														Helper::redirect($url);
													}
													?>
												</div>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Job Description</label>
										<div class="controls">
										<a href="#media-manager" data-toggle="modal" class="btn btn-primary"><i class="icon-picture"></i> Add Media</a><br/><br/>
											<textarea name="content" class='ckeditor span12' rows="5" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $content; ?></textarea>
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
									if($_FILES['featured_image']['name']!=''){
										$featured_image = upload_image($_FILES['featured_image'],'../uploads/privatejobs/','ntutorial_page');
									} else {
										$featured_image = $featured_image;
									}
								} else {
									$featured_image = upload_image($_FILES['featured_image'],'../uploads/privatejobs/','ntutorial_page');
								}
								
								$values = array(
									'job_category_id' => $_POST['job_category_id'],
									'post_date' => date('Y-m-d'),
									'end_date' => $_POST['end_date'],
									'country_id' => 1,
									'state_id' => $_POST['state_id'],
									'city_id' => $_POST['city_id'],
									'locality_id' => $_POST['locality_id'],
									'contact_number' => $_POST['contact_number'],
									'address' => $_POST['address'],
									'vacancies' => $_POST['vacancies'],
									'salary_from' => $_POST['salary_from'],
									'salary_to' => $_POST['salary_to'],
									'timings' => $_POST['timings'],
									'gender' => $_POST['gender'],
									'minimum_experience' => $_POST['minimum_experience'],
									'maximum_experience' => $_POST['maximum_experience'],
									'slug' => Sanitize::clean_slug($_POST['title']),
									'title' => $_POST['title'],
									'content' => $_POST['content'],
									'featured_image' => $featured_image,
									'meta_title' => $_POST['meta_title'],
									'meta_description' => $_POST['meta_description'],
									'meta_keywords' => strtolower($_POST['meta_keywords']),
									'sort_order' => 0,
									'status' => $_POST['status'],
								);

								$cond = array( 'id=' => $_GET['id'] );
								if(isset($_GET['action'])){
									DB::update_query('private_jobs',$values,$cond);
								} else {
									DB::insert_query('private_jobs',$values);	
								}

								Helper::redirect("private-jobs.php");
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include 'view/footer.php'; ?>