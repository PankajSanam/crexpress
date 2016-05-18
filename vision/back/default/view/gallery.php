<?php top_navigation(); ?>
<div class="container-fluid" id="content">
	<?php left_sidebar(); ?>
	<div id="main">
		<div class="container-fluid">
			<div class="page-header"><div class="pull-left"><h1>Gallery Management</h1></div><?php sub_header(); ?></div>
			<div class="breadcrumbs">
				<ul>
					<li><a href="dashboard.html">Home</a><i class="icon-angle-right"></i></li>
					<li><a href="gallery.html">Gallery Management</a><i class="icon-angle-right"></i></li>
					<li><a href="manage-gallery.html">Add Gallery</a></li>
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
									$galleries = Db::select('gallery');
									foreach($galleries as $gallery){
									?>
									<tr>
										<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
										<td><?php echo $gallery['id']; ?></td>
										<td><?php echo Gallery::category_name($gallery['gallery_category_id']); ?></td>
										<td><?php echo $gallery['gallery_name']; ?></td>
										<td><?php echo $gallery['gallery_image']; ?></td>
										<td class='hidden-350'><?php echo Helper::status($gallery['status']); ?></td>
										<td class='hidden-480'>
											<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
											<a href="manage-gallery.html?action=edit&id=<?php echo $gallery['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
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