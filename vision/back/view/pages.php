<?php echo $navigation; ?>
<div class="container-fluid" id="content">
	<?php echo $left_sidebar; ?>
	<div id="main">
		<div class="container-fluid">
			<?php echo $sub_header; ?>
			<div class="breadcrumbs">
				<ul>
					<li><a href="dashboard.html">Home</a><i class="icon-angle-right"></i></li>
					<li><a href="pages.html">Pages Management</a><i class="icon-angle-right"></i></li>
					<li><a href="pages-new.html">Add Pages</a></li>
				</ul>
				<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
			</div>
			<?php if(!isset($_GET['action']) AND !isset($_GET['templates'])){ ?>
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
										<th class='hidden-480'>Last Updated</th>
										<th class='hidden-1024'>Options</th>
									</tr>
									<tr>
										<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
										<th>ID</th>
										<th>Template</th>
										<th>Sort Order</th>
										<th>Page Name</th>
										<th>Page Slug</th>
										<th class='hidden-350'>Status</th>
										<th class='hidden-480'>Last Updated</th>
										<th class='hidden-1024'>Options</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($pages as $page){ ?>
									<tr>
										<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
										<td><?php echo $page['id']; ?></td>
										<td><?php echo template_name($page['page_template_id']); ?></td>
										<td><?php echo $page['menu_sort_order']; ?></td>
										<td><?php echo $page['title']; ?></td>
										<td><a target="_blank" href="<?php echo url($page['slug']); ?>"><?php echo $page['slug']; ?></a></td>
										<td class='hidden-350'><?php echo status($page['status']); ?></td>
										<td class='hidden-1024'><?php echo $page['last_updated'];?></td>
										<td class='hidden-480'>
											<a href="?action=edit&id=<?php echo $page['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
											<a href="?delete=<?php echo $encrypt->lock($page['id']); ?>" onclick="return ConfirmDelete();" class="btn" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
										</td>
									</tr>
									<?php 
									}
									?>
								</tbody>
							</table>
							<?php 
							if(isset($_GET['delete'])){
								$id = $encrypt->unlock($_GET['delete']);
								$Db = new Db;
								$Db->delete('pages',array( 'id=' => $id ));
								redirect('pages.html');
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php } if(isset($_GET['action']) AND !isset($_GET['action'])) {?>
			<div class="row-fluid">
				<div class="span12">
					<div class="box box-color box-bordered">
						<div class="box-title"><h3><i class="icon-th-list"></i> <?php echo ucfirst($_GET['action']);?> Page</h3></div>
						<div class="box-content nopadding">
							<?php
							foreach($edit_page as $edit){}
							extract($edit);
							?>
							<form method="POST" class='form-horizontal form-bordered form-wysiwyg ' enctype='multipart/form-data'>
								<div class="control-group">
									<label for="textfield" class="control-label">Parent Category</label>
									<div class="controls">
										<div class="input-xlarge">
											<select name="page_category_id" id="select" class='chosen-select'>
												<option value=""></option>
												<?php foreach($pages as $page_category) { ?>
												<option value="<?php echo $page_category['id'];?>" <?php if(isset($_GET['id']) && $page_category_id==$page_category['id']) echo ' selected ';  ?>><?php echo @$page_category['menu_name'];?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label for="textfield" class="control-label">Page Template</label>
									<div class="controls">
										<div class="input-xlarge">
											<select name="page_template_id" id="page_template_id" class='chosen-select'>
												<option value=""></option>
												<?php 
												$page_templates = Db::select('page_templates');
												foreach($page_templates as $page_template) {
												?>
												<option value="<?php echo $page_template['id'];?>" <?php if(isset($_GET['id']) && $page_template_id==$page_template['id']) echo ' selected ';  ?>><?php echo @$page_template['template_name'];?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label for="menu_name" class="control-label">Menu Name</label>
									<div class="controls">
										<input type="text" name="menu_name" id="menu_name" value="<?php if(isset($_GET['id'])) echo $menu_name; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
									</div>
								</div>
								<div class="control-group">
									<label for="menu_name" class="control-label">Menu Sort Order</label>
									<div class="controls">
										<input type="text" name="menu_sort_order" id="menu_sort_order" value="<?php if(isset($_GET['id'])) echo $menu_sort_order; ?>" class="input-small" data-rule-required="true" data-rule-minlength="2">
									</div>
								</div>
								<div class="control-group">
									<label for="textfield" class="control-label">Menu Position</label>
									<div class="controls">
										<div class="input-small">
											<select name="menu_position" id="menu_position" class='chosen-select'>
												<option value=""></option>
												<option value="top" <?php if(isset($_GET['id']) && $menu_position=='top') echo ' selected ';  ?>>Top</option>
											</select>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label for="textfield" class="control-label">Page Name</label>
									<div class="controls">
										<input type="text" name="title" id="title" value="<?php if(isset($_GET['id'])) echo $title; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2">
										<span class="help-block">This will be shown on pages.</span>
									</div>
								</div>
								<div class="control-group">
									<label for="textfield" class="control-label">Page Slug</label>
									<div class="controls">
										<div class="input-append">
											<input type="text" class='username-check' name="slug" value="<?php if(isset($_GET['id'])) echo $slug; ?>" data-rule-required="true" data-rule-minlength="2">
											<a href="#" class="btn add-on username-check-force"><i class="icon-refresh"></i></a>
										</div>
										<span class="help-block">Please enter a page slug</span>
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
												<img src=<?php echo DATA_VISION; ?>"/pages/<?php echo $featured_image; ?>" />
												<?php
												} else {
												?>
												<img src="<?php echo BACK_VISION; ?>/img/no_image.gif" />
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
												<?php if(isset($featured_image)) { ?>
												<input class="btn" type="submit" name="remove_image" value="Remove Image" />
												<?php } ?>
												<?php
												if(isset($_POST['remove_image'])){
													Db::update('pages',array( 'featured_image' => '' ),array( 'id=' => $_GET['id'] ));
													$remove_file1 = DATA_PATH.'/pages/original/'.$featured_image;
													$remove_file2 = DATA_PATH.'/pages/'.$featured_image;
													@unlink($remove_file1);
													@unlink($remove_file2);
													$url ='pages-new.html?action=edit&id='.$_GET['id'];
													Helper::redirect($url);
												}
												?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label for="textfield" class="control-label">Page Content</label>
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
												<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="1" <?php if(isset($_GET['id']) && $status==1) echo ' checked ';  ?>> <label class='inline' for="status">Enable</label>
											</div>
											<div class="check-line">
												<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="0" <?php if(isset($_GET['id']) && $status==0) echo ' checked ';  ?>> <label class='inline' for="status">Disable</label>
											</div>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn btn-primary" name="add_page">Save changes</button>
									<button type="button" class="btn" onClick="history.go(-1);">Cancel</button>
								</div>
							</form>
						</div>
						<?php
						if(isset($_POST['add_page'])){
							if(isset($_GET['action'])) {
								if($_FILES['featured_image']['name']!=''){
									$featured_image = Upload::image($_FILES['featured_image'], DATA_PATH.'/pages/original/');
									$old_image_path = DATA_PATH.'/pages/original/' . $featured_image;
									$new_image_path = DATA_PATH.'/pages/' . $featured_image;
									Image::resize('crop',$old_image_path,$new_image_path,225,220);
								} else {
									$featured_image = $featured_image;
								}
							} else {
								$featured_image = Upload::image($_FILES['featured_image'], DATA_PATH.'/pages/');
								$old_image_path = DATA_PATH.'/pages/original/' . $featured_image;
								$new_image_path = DATA_PATH.'/pages/' . $featured_image;
								Image::resize('crop',$old_image_path,$new_image_path,225,220);
							}
							
							$values = array(
								'page_category_id' 	=> 	$_POST['page_category_id'],
								'page_template_id' 	=> 	$_POST['page_template_id'],
								'menu_name' 		=> 	$_POST['menu_name'],
								'menu_position' 	=> 	$_POST['menu_position'],
								'menu_sort_order' 	=> 	$_POST['menu_sort_order'],
								'slug' 				=> 	Sanitize::clean($_POST['slug']),
								'title' 			=> 	$_POST['title'],
								'content' 			=> 	$_POST['content'],
								'featured_image' 	=> 	$featured_image,
								'meta_title' 		=> 	$_POST['meta_title'],
								'meta_description' 	=> 	$_POST['meta_description'],
								'meta_keywords' 	=> 	strtolower($_POST['meta_keywords']),
								'last_updated' 		=> 	date("Y-m-d"),
								'status' 			=> 	$_POST['status']
							);

							if(isset($_GET['action'])){
								$res = Db::update('pages',$values, array( 'id=' => $_GET['id'] ));
							} else {
								$res = Db::insert('pages',$values);	
							}
							Helper::redirect('pages.html');
						}
						?>
					</div>
				</div>
			</div>
			<?php } if(isset($_GET['templates'])) {?>
			<div class="row-fluid">
				<div class="span12">
					<div class="box box-color box-bordered">
						<div class="box-title"><h3>Page Template Manager</h3></div>
						<div class="box-content ">
							<div class="grids">
								<div class="span4">
									<?php
									if(isset($_GET['action'])){
										$Db = new Db;
										$pages_template_data = $Db->select('page_templates',array( 'id=' => $_GET['id']) );
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
									$template_name = $sanitize->clean($_POST['template_name']);
									$values = array( 'template_name' => $template_name );

									$Db = new Db;
									if(isset($_GET['action'])){
										$Db->update('page_templates',$values, array( 'id=' => $_GET['id'] ));
									} else {
										$Db->insert('page_templates',$values);	
									}

									$helper->redirect('page-templates.html');
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
											<?php foreach($page_templates as $page_template){ ?>
											<tr>
												<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
												<td><?php echo $page_template['id']; ?></td>
												<td><?php echo $page_template['template_name']; ?></td>
												<td class='hidden-480'>
													<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
													<a href="pages.html?templates&action=edit&id=<?php echo $page_template['id']; ?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
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
			<?php }?>
		</div>
	</div>
</div>