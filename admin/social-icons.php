<?php include 'view/header.php'; ?>
<?php top_navigation(); ?>
<div class="container-fluid" id="content">
	<?php left_sidebar(); ?>
	<div id="main">
		<div class="container-fluid">
			<div class="page-header"><div class="pull-left"><h1>Social Icons Management</h1></div><?php sub_header(); ?></div>
			<div class="breadcrumbs">
				<ul>
					<li><a href="dashboard.php">Home</a><i class="icon-angle-right"></i></li>
					<li><a href="social-icons.php">Social Icons Management</a><i class="icon-angle-right"></i></li>
					<li><a href="manage-social-icons.php">Add Social Icons</a></li>
				</ul>
				<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box box-color box-bordered">
						<div class="box-title"><h3>Social Icon Management</h3></div>
						<div class="box-content nopadding">
							<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
								<thead>
									<tr class='thefilter'>
										<th class='with-checkbox'></th>
										<th>ID</th>
										<th>Name</th>
										<th>Image</th>
										<th>URL</th>
										<th>Link</th>
										<th class='hidden-350'>Status</th>
										<th class='hidden-480'>Options</th>
									</tr>
									<tr>
										<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
										<th>ID</th>
										<th>Name</th>
										<th>Image</th>
										<th>URL</th>
										<th>Link</th>
										<th class='hidden-350'>Status</th>
										<th class='hidden-480'>Options</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$social_icons = Db::select('social_icons');
									foreach($social_icons as $social_icon){
									?>
									<tr>
										<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
										<td><?php echo $social_icon['id']; ?></td>
										<td><?php echo $social_icon['name']; ?></td>
										<td><?php echo $social_icon['image']; ?></td>
										<td><?php echo $social_icon['url']; ?></td>
										<td><?php echo $social_icon['link']; ?></td>
										<td class='hidden-350'><?php echo Helper::status($social_icon['status']); ?></td>
										<td class='hidden-480'>
											<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
											<a href="manage-social-icons.php?action=edit&id=<?php echo $social_icon['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
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