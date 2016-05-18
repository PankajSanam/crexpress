<?php include 'view/header.php'; ?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<title>GIT BOX - Gallery</title>

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
					<div class="pull-left"><h1>Gallery Management</h1></div>
					<?php sub_header(); ?>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="gallery.php">Gallery Management</a><i class="icon-angle-right"></i></li>
						<li><a href="manager-gallery.php">Add Gallery</a></li>
					</ul>
					<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title"><h3>Gallery Management</h3></div>
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
									<thead>
										<tr class='thefilter'>
											<th class='with-checkbox'></th>
											<th>ID</th>
											<th>Category</th>
											<th>Name</th>
											<th>Image</th>
											<th class='hidden-350'>Status</th>
											<th class='hidden-480'>Options</th>
										</tr>
										<tr>
											<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
											<th>ID</th>
											<th>Category</th>
											<th>Name</th>
											<th>Image</th>
											<th class='hidden-350'>Status</th>
											<th class='hidden-480'>Options</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$galleries = $db->select_query('gallery');
										foreach($galleries as $gallery){
										?>
										<tr>
											<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
											<td><?php echo $gallery['id']; ?></td>
											<td><?php echo get_gallery_category_name($gallery['gallery_category_id']); ?></td>
											<td><?php echo $gallery['gallery_name']; ?></td>
											<td><?php echo $gallery['gallery_image']; ?></td>
											<td class='hidden-350'><?php echo get_status($gallery['status']); ?></td>
											<td class='hidden-480'>
												<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
												<a href="manage-gallery.php?action=edit&id=<?php echo $gallery['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
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
<?php include 'view/footer.php'; ?>