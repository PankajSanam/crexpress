<?php include 'view/header.php'; ?>
<?php top_navigation(); ?>
<div class="container-fluid" id="content">
	<?php left_sidebar(); ?>
	<div id="main">
		<div class="container-fluid">
			<div class="page-header"><div class="pull-left"><h1>Page Template Manager</h1></div><?php sub_header(); ?></div>
			<div class="breadcrumbs">
				<ul>
					<li><a href="dashboard.php">Home</a><i class="icon-angle-right"></i></li>
					<li><a href="pages.php">Pages</a><i class="icon-angle-right"></i></li>
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
										$pages_template_data = Db::select('page_templates',array( 'id=' => $_GET['id']) );
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
									$values = array( 'template_name' => Sanitize::clean($_POST['template_name']) );

									if(isset($_GET['action'])){
										Db::update('page_templates',$values, array( 'id=' => $_GET['id'] ));
									} else {
										Db::insert('page_templates',$values);	
									}

									Helper::redirect('page-templates.php');
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
											$page_templates = DB::select('page_templates');
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