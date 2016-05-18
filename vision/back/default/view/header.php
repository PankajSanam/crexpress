<?php 

//Template Files
include SERVER_ROOT.'/vision/back/'.THEME_NAME.'/view/top_navigation.php';
include SERVER_ROOT.'/vision/back/'.THEME_NAME.'/view/left_sidebar.php';
include SERVER_ROOT.'/vision/back/'.THEME_NAME.'/view/sub_header.php';

if($_GET['page2'] == 'index')  {
	$body_class = 'login'; 
} 
elseif($_GET['page2'] == '404') {
	$body_class= 'error';
} else {
	$body_class = '';
}

if($_GET['page2'] == 'index') {
	// nothing happens
} else {
	Validation::admin_auth();
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<title><?php
	if($_GET['page2'] == 'dashboard') echo 'Dashboard - GIT BOX';
	if($_GET['page2'] == 'file-manager') echo 'Media Manager - GIT BOX';
	if($_GET['page2'] == 'gallery') echo 'Gallery - GIT BOX';
	if($_GET['page2'] == 'home-slider') echo 'Home Slider - GIT BOX';
	if($_GET['page2'] == 'index') echo 'Login - GIT BOX';
	if($_GET['page2'] == 'job-enquiries') echo 'Job Enquiries - GIT BOX';
	if($_GET['page2'] == 'manage-gallery') echo 'Manage Gallery - GIT BOX';
	if($_GET['page2'] == 'manage-job-enquiry') echo 'Manage Job Enquiry - GIT BOX';
	if($_GET['page2'] == 'manage-slider') echo 'Manage Home Slider - GIT BOX';
	if($_GET['page2'] == 'manage-social-icons') echo 'Manage Social Icons - GIT BOX';
	if($_GET['page2'] == 'manage-users') echo 'Manage Users - GIT BOX';
	if($_GET['page2'] == 'packages') echo 'Packages - GIT BOX';
	if($_GET['page2'] == 'pages') echo 'Pages - GIT BOX';
	if($_GET['page2'] == 'pages-new') echo 'Manage Pages - GIT BOX';
	if($_GET['page2'] == 'page-templates') echo 'Page Templates - GIT BOX';
	if($_GET['page2'] == 'post-private-job') echo 'Manage Private Jobs - GIT BOX';
	if($_GET['page2'] == 'private-jobs') echo 'Private Jobs - GIT BOX';
	if($_GET['page2'] == 'social-icons') echo 'Social Icons - GIT BOX';
	if($_GET['page2'] == 'user-profile') echo 'User Profile - GIT BOX';
	if($_GET['page2'] == 'users') echo 'Users - GIT BOX';
	if($_GET['page2'] == '404') echo 'Not Found - GIT BOX';
	?></title>

	<?php
	Html::styles(array(
		//Bootstrap
			'bootstrap.min' => '',
		//Bootstrap responsive
			'bootstrap-responsive.min' => '',
		//jQuery UI
			'plugins/jquery-ui/smoothness/jquery-ui' => '',
			'plugins/jquery-ui/smoothness/jquery.ui.theme' => '',
		//Tagsinput
			'plugins/tagsinput/jquery.tagsinput' => '',
		//multi select
			'plugins/multiselect/multi-select' => '',
		//chosen
			'plugins/chosen/chosen' => '',
		//PageGuide
			'plugins/pageguide/pageguide' => '',
		//Fullcalendar
			'plugins/fullcalendar/fullcalendar' => '',
			'plugins/fullcalendar/fullcalendar.print' => 'print',
		//select2
			'plugins/select2/select2' => '',
		//icheck
			'plugins/icheck/all' => '',
		//timepicker
			'plugins/timepicker/bootstrap-timepicker.min' => '',
		//colorpicker
			'plugins/colorpicker/colorpicker' => '',
		//Datepicker
			'plugins/datepicker/datepicker' => '',
		//Daterangepicker
			'plugins/daterangepicker/daterangepicker' => '',
		//Plupload
			'plugins/plupload/jquery.plupload.queue' => '',
		//dataTables
			'plugins/datatable/TableTools' => '',
		//Theme CSS
			'style' => '',
		//Color CSS
			'themes' => '',
	),1);
	?>
	
	<?php
	Html::scripts(array(
		//jQuery
			'jquery.min',
		//Nice Scroll
			'plugins/nicescroll/jquery.nicescroll.min',
		//imagesLoaded
			'plugins/imagesLoaded/jquery.imagesloaded.min',
		//jQuery UI
			'plugins/jquery-ui/jquery.ui.core.min',
			'plugins/jquery-ui/jquery.ui.widget.min',
			'plugins/jquery-ui/jquery.ui.mouse.min',
			'plugins/jquery-ui/jquery.ui.resizable.min',
			'plugins/jquery-ui/jquery.ui.sortable.min',
			'plugins/jquery-ui/jquery.ui.selectable.min',
			'plugins/jquery-ui/jquery.ui.droppable.min',
			'plugins/jquery-ui/jquery.ui.draggable.min',
			'plugins/jquery-ui/jquery.ui.datepicker.min',
			'plugins/jquery-ui/jquery.ui.spinner',
			'plugins/jquery-ui/jquery.ui.slider',
		//Touch enable for jquery UI
			'plugins/touch-punch/jquery.touch-punch.min',
		//slimScroll
			'plugins/slimscroll/jquery.slimscroll.min',
		//Bootstrap
			'bootstrap.min',
		//vmap
			'plugins/vmap/jquery.vmap.min',
			'plugins/vmap/jquery.vmap.world',
			'plugins/vmap/jquery.vmap.sampledata',
		//Bootbox
			'plugins/bootbox/jquery.bootbox',
		//dataTables
			'plugins/datatable/jquery.dataTables.min',
			'plugins/datatable/TableTools.min',
			'plugins/datatable/ColReorderWithResize',
			'plugins/datatable/ColVis.min',
			'plugins/datatable/jquery.dataTables.columnFilter',
			'plugins/datatable/jquery.dataTables.grouping',
		//Flot
			'plugins/flot/jquery.flot.min',
			'plugins/flot/jquery.flot.bar.order.min',
			'plugins/flot/jquery.flot.pie.min',
			'plugins/flot/jquery.flot.resize.min',
		//imagesLoaded
			'plugins/imagesLoaded/jquery.imagesloaded.min',
		//PageGuide
			'plugins/pageguide/jquery.pageguide',
		//Masked inputs
			'plugins/maskedinput/jquery.maskedinput.min',
		//TagsInput
			'plugins/tagsinput/jquery.tagsinput.min',
		//Datepicker
			'plugins/datepicker/bootstrap-datepicker',
		//Daterangepicker
			'plugins/daterangepicker/daterangepicker',
			'plugins/daterangepicker/moment.min',
		//Timepicker
			'plugins/timepicker/bootstrap-timepicker.min',
		//Colorpicker
			'plugins/colorpicker/bootstrap-colorpicker',
		//MultiSelect
			'plugins/multiselect/jquery.multi-select',
		//PLUpload
			'plugins/plupload/plupload.full',
			'plugins/plupload/jquery.plupload.queue',
		//Custom file upload
			'plugins/fileupload/bootstrap-fileupload.min',
			'plugins/mockjax/jquery.mockjax',
		//complexify
			'plugins/complexify/jquery.complexify-banlist.min',
			'plugins/complexify/jquery.complexify.min',
		//Mockjax
			'plugins/mockjax/jquery.mockjax',
		//FullCalendar
			'plugins/fullcalendar/fullcalendar.min',
		//Chosen
			'plugins/chosen/chosen.jquery.min',
		//select2
			'plugins/select2/select2.min',
		//icheck
			'plugins/icheck/jquery.icheck.min',
		//Validation
			'plugins/validation/additional-methods.min',
		//Bootbox
			'plugins/bootbox/jquery.bootbox',
		//Theme framework
			'eakroko.min',
		//Theme scripts
			'application.min',
		//Just for demonstration
			'demonstration.min',
	),1);
	?>
	
	<!--[if lte IE 9]>
		<?php
		Html::scripts(array(
			'plugins/placeholder/jquery.placeholder.min',
		),1);
		?>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo BACK_VISION; ?>/img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo BACK_VISION; ?>/img/apple-touch-icon-precomposed.png" />
</head>
<body class="<?php echo $body_class; ?>">
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
		<div class="modal-body nopadding">
			<div class="file-manager"></div>
		</div>
	</div>