<?php include 'view/header.php'; ?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<title>GIT Admin Panel - Page Templates</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- dataTables -->
	<link rel="stylesheet" href="css/plugins/datatable/TableTools.css">
	<!-- chosen -->
	<link rel="stylesheet" href="css/plugins/chosen/chosen.css">
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
	<script src="js/plugins/jquery-ui/jquery.ui.datepicker.min.js"></script>
	<!-- slimScroll -->
	<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Bootbox -->
	<script src="js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- dataTables -->
	<script src="js/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="js/plugins/datatable/TableTools.min.js"></script>
	<script src="js/plugins/datatable/ColReorderWithResize.js"></script>
	<script src="js/plugins/datatable/ColVis.min.js"></script>
	<script src="js/plugins/datatable/jquery.dataTables.columnFilter.js"></script>
	<script src="js/plugins/datatable/jquery.dataTables.grouping.js"></script>
	<!-- Chosen -->
	<script src="js/plugins/chosen/chosen.jquery.min.js"></script>

	<!-- Custom file upload -->
	<script src="js/plugins/fileupload/bootstrap-fileupload.min.js"></script>
	<script src="js/plugins/mockjax/jquery.mockjax.js"></script>

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
	<?php top_navigation(); ?>
	<div class="container-fluid" id="content">
		<?php left_sidebar(); ?>
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left"><h1>Page Template Manager</h1></div>
					<?php sub_header(); ?>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Content</a>
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="page-templates.php">Page Template Manager</a></li>
					</ul>
					<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title"><h3>Page Template Manager</h3></div>
							<div class="box-content ">
								<div class="grids">
									<div class="span4">
										<?php
										if(isset($_GET['action'])){
											$pages_template_data = get_page_template_data($_GET['id']);
											foreach($pages_template_data as $template_data){
												extract($template_data);
											}
										}
										?>
										<form method="POST" enctype='multipart/form-data'>
											<div class="control-group">
												<label for="textfield" class="control-label">Template Name</label>
												<div class="controls">
													<input type="text" name="template_name" id="template_name" value="<?php if(isset($_GET['action'])) echo $template_name; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2">
												</div>
											</div>
											<button type="submit" class="btn btn-primary" name="save">Save </button>
										</form>
									</div>
									<?php
									if(isset($_POST['save'])){
										$values = array( 'template_name' => get_slug($_POST['template_name']) );
										$cond = array( 'id' => $_GET['id'] );
										if(isset($_GET['action'])){
											$db->update_query('page_templates',$values,$cond);
										} else {
											$db->insert_query('page_templates',$values);	
										}
										header("Location:page-templates.php");
									}
									?>
									<div class="span8">
										<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
											<thead>
												<tr class='thefilter'>
													<th class='with-checkbox'></th>
													<th>Template ID</th>
													<th>Template Name</th>
													<th class='hidden-480'>Options</th>
												</tr>
												<tr>
													<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
													<th>Template ID</th>
													<th>Template Name</th>
													<th class='hidden-480'>Options</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$page_templates = get_page_templates();
												foreach($page_templates as $page_template){
												?>
												<tr>
													<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
													<td><?php echo $page_template['id']; ?></td>
													<td><?php echo $page_template['template_name']; ?></td>
													<td class='hidden-480'>
														<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
														<a href="?action=edit&id=<?php echo $page_template['id']; ?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
														<a href="#" class="btn" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
													</td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include 'view/footer.php'; ?>