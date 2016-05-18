<?php include 'view/header.php'; ?>
<?php top_navigation(); ?>
<div class="container-fluid" id="content">
	<?php left_sidebar(); ?>
	<div id="main">
		<div class="container-fluid">
			<div class="page-header">
				<div class="pull-left"><h1>Packages</h1></div>
				<?php sub_header(); ?>
			</div>
			<div class="breadcrumbs">
				<ul>
					<li><a href="dashboard.php">Home</a><i class="icon-angle-right"></i></li>
					<li><a href="packages.php">Packages</a><i class="icon-angle-right"></i></li>
					<li><a href="manage-package.php">Install Package</a></li>
				</ul>
				<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box box-color box-bordered">
						<div class="box-title"><h3>Packages</h3></div>
						<div class="box-content nopadding">
							<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
								<thead>
									<tr class='thefilter'>
										<th class='with-checkbox'></th>
										<th>ID</th>
										<th>Name</th>
										<th>Description</th>
										<th>Author</th>
										<th class='hidden-350'>Status</th>
										<th class='hidden-480'>Options</th>
									</tr>
									<tr>
										<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
										<th>ID</th>
										<th>Name</th>
										<th>Description</th>
										<th>Author</th>
										<th class='hidden-350'>Status</th>
										<th class='hidden-480'>Options</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$packages = Db::select('packages');
									foreach($packages as $package){
									?>
									<tr>
										<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
										<td><?php echo $package['id']; ?></td>
										<td><?php echo $package['name']; ?></td>
										<td><?php echo $package['description']; ?></td>
										<td><a href="http://<?php echo $package['url'];?>" target="_blank"><?php echo $package['author']; ?></a></td>
										<td class='hidden-350'><?php echo Helper::status($package['status']); ?></td>
										<td class='hidden-480'>
											<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
											<a href="post-private-job.php?action=edit&id=<?php echo $package['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
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