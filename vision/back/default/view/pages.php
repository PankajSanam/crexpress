<?php top_navigation(); ?>
<div class="container-fluid" id="content">
	<?php left_sidebar(); ?>
	<div id="main">
		<div class="container-fluid">
			<div class="page-header"><div class="pull-left"><h1>Pages Management</h1></div><?php sub_header(); ?></div>
			<div class="breadcrumbs">
				<ul>
					<li><a href="dashboard.html">Home</a><i class="icon-angle-right"></i></li>
					<li><a href="pages.html">Pages Management</a><i class="icon-angle-right"></i></li>
					<li><a href="pages-new.html">Add Pages</a></li>
				</ul>
				<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box box-color box-bordered">
						<div class="box-title"><h3>Pages Management</h3></div>
						<div class="box-content nopadding">
							<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
								<thead>
									<tr class='thefilter'>
										<th class='with-checkbox'></th>
										<th>ID</th>
										<th>Template</th>
										<th>Sort Order</th>
										<th>Page Name</th>
										<th>Page Slug</th>
										<th class='hidden-350'>Status</th>
										<th class='hidden-1024'>Last Updated</th>
										<th class='hidden-480'>Options</th>
									</tr>
									<tr>
										<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
										<th>ID</th>
										<th>Template</th>
										<th>Sort Order</th>
										<th>Page Name</th>
										<th>Page Slug</th>
										<th class='hidden-350'>Status</th>
										<th class='hidden-1024'>Last Updated</th>
										<th class='hidden-480'>Options</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$pages = Db::select('pages');
									foreach($pages as $page){
									?>
									<tr>
										<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
										<td><?php echo $page['id']; ?></td>
										<td><?php echo Page::template_name($page['page_template_id']); ?></td>
										<td><?php echo $page['menu_sort_order']; ?></td>
										<td><?php echo $page['title']; ?></td>
										<td><?php echo $page['slug']; ?></td>
										<td class='hidden-350'><?php echo Helper::status($page['status']); ?></td>
										<td class='hidden-1024'><?php echo $page['last_updated'];?></td>
										<td class='hidden-480'>
											<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
											<a href="pages-new.html?action=edit&id=<?php echo $page['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
											<a href="?delete=<?php echo Encrypt::lock($page['id']); ?>" onclick="return ConfirmDelete();" class="btn" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
										</td>
									</tr>
									<?php 
									}
									?>
								</tbody>
							</table>
							<?php 
							if(isset($_GET['delete'])){
								$id = Encrypt::unlock($_GET['delete']);
								Db::delete('pages',array( 'id=' => $id ));
								Helper::redirect('pages.html');
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>