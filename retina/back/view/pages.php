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
					<li><a href="pages.html?action=add">Add Pages</a></li>
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
										<td><a target="_blank" href="<?php echo page_url($page['slug']); ?>"><?php echo $page['slug']; ?></a></td>
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
								$enc_id = trim($_GET['delete']);
								$id = $encrypt->unlock($enc_id);

								if(is_deletable('pages',$id)){
									redirect('pages.html');
								} else {
									alert('This page cannot be deleted. You may disable it if you want.');
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php } if(isset($_GET['action']) AND !isset($_GET['templates'])) {?>
			<div class="row-fluid">
				<div class="span12">
					<div class="box box-color box-bordered">
						<div class="box-title"><h3><i class="icon-th-list"></i> <?php echo ucfirst($_GET['action']);?> Page</h3></div>
						<div class="box-content nopadding">
							<?php
							foreach($edit_page as $edit){}
							extract($edit);
							?>
							<ul class="tabs tabs-inline tabs-top">
								<li class='active'><a href="#contentoption" data-toggle='tab'><i class="glyphicon-pencil"></i> Content</a></li>
								<li><a href="#menuoption" data-toggle='tab'><i class="glyphicon-cogwheels"></i> Menu Settings</a></li>
								<li><a href="#seo" data-toggle='tab'><i class="glyphicon-globe_af"></i> SEO Settings</a></li>
								<li><a href="#other" data-toggle='tab'><i class="glyphicon-circle_info"></i> Other</a></li>
							</ul>
							<form method="POST" class='form-horizontal form-bordered form-wysiwyg ' enctype='multipart/form-data'>
								<div class="tab-content nopadding tab-content-inline tab-content-bottom">
									<div class="tab-pane active" id="contentoption">
										<div class="span12">
											<div class="span6">
												<div class="control-group">
													<label for="title" class="control-label">Page Name</label>
													<div class="controls">
														<input type="text" name="title" id="title" value="<?php if(isset($_GET['id'])) echo $title; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2">
														<span class="help-block">Visible on pages heading.</span>
													</div>
												</div>
											</div>
											<div class="span6">
												<div class="control-group_">
													<!-- <label for="featured_image" class="control-label">Featured Image</label> -->
													<div class="controls_">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															<div class="fileupload-new thumbnail" style="width: 130px; height: 100px;">
																<?php if(isset($_GET['id']) AND $featured_image!='') { ?>
																<img src=<?php echo DATA_VISION; ?>"/pages/<?php echo $featured_image; ?>" />
																<?php } else { ?>
																<img src="<?php echo BACK_VISION; ?>/img/no_image.gif" />
																<?php } ?>
															</div>
															<div class="fileupload-preview fileupload-exists thumbnail" style="max-width:200px; max-height:150px; line-height:20px;"></div>
															<span class="btn btn-file">
																<span class="fileupload-new">Select image</span>
																<span class="fileupload-exists">Change</span>
																<input type="file" name='featured_image' />
															</span>
															<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
															<?php if(isset($featured_image) AND isset($_GET['id'])) { ?>
															<input class="btn" type="submit" name="remove_image" value="Remove Image" />
															<?php } ?>
															<?php
															if(isset($_POST['remove_image'])){
																$Db = new Db;
																$Db->update('pages',array( 'featured_image' => '' ),array( 'id=' => $_GET['id'] ));
																$remove_file1 = DATA_PATH.'/pages/original/'.$featured_image;
																$remove_file2 = DATA_PATH.'/pages/'.$featured_image;
																@unlink($remove_file1);
																@unlink($remove_file2);
																$url ='pages.html?action=edit&id='.$_GET['id'];
																redirect($url);
															}
															?>
														</div>
													</div>
												</div>
											</div>
											<div class="control-group">
												<label for="content" class="control-label">Content</label>
												<div class="controls">
													<!-- <a href="#media-manager" data-toggle="modal" class="btn btn-primary"><i class="icon-picture"></i> Add Media</a><br/><br/> -->
													<textarea name="content" class='ckeditor span12' rows="5" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $content; ?></textarea>
												</div>
											</div>
											<div class="form-actions">
												<button type="submit" class="btn btn-primary" name="save">Save changes</button>
												<button type="button" class="btn" onClick="history.go(-1);">Cancel</button>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="menuoption">
										<div class="control-group">
											<label for="menu_name" class="control-label">Menu Name</label>
											<div class="controls">
												<input type="text" name="menu_name" id="menu_name" value="<?php if(isset($_GET['id'])) echo $menu_name; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
											</div>
										</div>
										<div class="control-group">
											<label for="menu_name_alt" class="control-label">Alternative Menu Name</label>
											<div class="controls">
												<input type="text" name="menu_name_alt" id="menu_name_alt" value="<?php if(isset($_GET['id'])) echo $menu_name_alt; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
											</div>
										</div>
										<div class="control-group">
											<label for="menu_sort_order" class="control-label">Menu Sort Order</label>
											<div class="controls">
												<input type="text" name="menu_sort_order" id="menu_sort_order" value="<?php if(isset($_GET['id'])) echo $menu_sort_order; ?>" class="input-small" data-rule-required="true" data-rule-minlength="2">
											</div>
										</div>
										<div class="control-group">
											<label for="menu_position" class="control-label">Menu Position</label>
											<div class="controls">
												<div class="input-xlarge">
													<select name="menu_position[]" id="menu_position" multiple="multiple" class="chosen-select input-xlarge">
														<?php 
														$positions = array('top','bottom','left','right');
														foreach($positions as $position) { ?>
														<option value="<?php echo $position;?>" <?php
																								if(isset($_GET['id'])) {
																									$pagex = explode(',', $menu_position);
																									$i = 0;
																									$c = count($pagex) - 1;
																									foreach($pagex as $p) {
																										if($p==$position) {
																											echo ' selected ';
																										} else {
																											echo '';
																										}
																									}
																								}?>><?php echo $position; ?></option>
														<?php if($i>$c) $i++; } ?>
													</select>
												</div>
											</div>
										</div>
										<div class="form-actions">
											<button type="submit" class="btn btn-primary" name="save">Save changes</button>
											<button type="button" class="btn" onClick="history.go(-1);">Cancel</button>
										</div>
									</div>
									<div class="tab-pane" id="seo">
										<div class="control-group">
											<label for="slug" class="control-label">Page Slug</label>
											<div class="controls">
												<input type="text" name="slug" id="slug" value="<?php if(isset($_GET['id'])) echo $slug; ?>" class="input-xlarge" data-rule-required="true">
												<span class="help-block">Page slug represents the page url.</span>
											</div>
										</div>
										<div class="control-group">
											<label for="meta_title" class="control-label">Meta Title</label>
											<div class="controls">
												<input type="text" name="meta_title" id="meta_title" value="<?php if(isset($_GET['id'])) echo $meta_title; ?>" class="input-xlarge" data-rule-required="true">
												<span class="help-block">This will be shown on pages.</span>
											</div>
										</div>
										<div class="control-group">
											<label for="meta_description" class="control-label">Meta Description</label>
											<div class="controls">
												<textarea name="meta_description" id="meta_description" rows="5" style="width:300px;" class="input-block-level" data-rule-required="true"><?php if(isset($_GET['id'])) echo $meta_description; ?></textarea>
												<span class="help-block">Please enter meta description.</span>
											</div>
										</div>
										<div class="control-group">
											<label for="meta_keywords" class="control-label">Meta Keywords</label>
											<div class="controls">
												<div class="span12">
													<input type="text" name="meta_keywords" id="meta_keywords" value="<?php if(isset($_GET['id'])) echo $meta_keywords; ?>" class="tagsinput" value="tutorial,education" data-rule-required="true">
												</div>
											</div>
										</div>
										<div class="form-actions">
											<button type="submit" class="btn btn-primary" name="save">Save changes</button>
											<button type="button" class="btn" onClick="history.go(-1);">Cancel</button>
										</div>
									</div>
									<div class="tab-pane" id="other">
										<div class="control-group">
											<label for="page_category_id" class="control-label">Parent Category</label>
											<div class="controls">
												<div class="input-large">
													<select name="page_category_id" id="page_category_id" class='chosen-select'>
														<option value="">--Select--</option>
														<?php foreach($pages as $page_category) { ?>
														<option value="<?php echo $page_category['id'];?>" <?php if(isset($_GET['id']) && $page_category_id==$page_category['id']) echo ' selected ';  ?>><?php echo @$page_category['menu_name'];?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>
										<div class="control-group">
											<label for="page_template_id" class="control-label">Page Template</label>
											<div class="controls">
												<div class="input-medium">
													<select name="page_template_id" id="page_template_id" class='chosen-select input-small'>
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
												<label for="status" class="control-label">Status</label>
												<div class="controls">
													<div class="check-demo-col">
														<div class="check-line">
															<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="1" <?php if(isset($_GET['id']) AND $status==1) echo ' checked '; else echo ' checked';  ?>> <label class='inline' for="status">Enable</label>
														</div>
														<div class="check-line">
															<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="0" <?php if(isset($_GET['id']) AND $status==0) echo ' checked '; else echo ''; ?>> <label class='inline' for="status">Disable</label>
														</div>
													</div>
												</div>
											</div>
										<div class="form-actions">
											<button type="submit" class="btn btn-primary" name="save">Save changes</button>
											<button type="button" class="btn" onClick="history.go(-1);">Cancel</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						<?php
						if(isset($_POST['save'])){
							if(isset($_GET['action'])) {
								if($_FILES['featured_image']['name']!=''){
									$featured_image = $upload->image($_FILES['featured_image'], DATA_PATH.'/pages/original/');
									$old_image_path = DATA_PATH.'/pages/original/' . $featured_image;
									$new_image_path = DATA_PATH.'/pages/' . $featured_image;
									$image->resize('crop',$old_image_path,$new_image_path,225,220);
								} else {
									$featured_image = $featured_image;
								}
							} else {
								$featured_image = $upload->image($_FILES['featured_image'], DATA_PATH.'/pages/');
								$old_image_path = DATA_PATH.'/pages/original/' . $featured_image;
								$new_image_path = DATA_PATH.'/pages/' . $featured_image;
								$image->resize('crop',$old_image_path,$new_image_path,225,220);
							}

							$Db = new Db;
							$page_category = $_POST['page_category_id'];
							$meta_title = ($_POST['meta_title']!='' ? $_POST['meta_title'] : $_POST['title']);
							$menu_name = ($_POST['menu_name']!='' ? $_POST['menu_name'] : $_POST['title']);
							$page_template_id = ($_POST['page_template_id']!='' ? $_POST['page_template_id'] : 2);

							/* page slug ki ramayan starts from here */
							if($page_category!=0) {
								$page_cat_names = $Db->select('pages', array('id=' => $page_category));
								foreach ($page_cat_names as $page_cat_name) {
									$page_category_name = $page_cat_name['slug'];
								}

								$page_cat_slug = explode('.',$page_category_name);
								$page_cat_slug = '-'.$page_cat_slug[0];

								if($_POST['slug']!=''){
									$slug = $sanitize->clean($_POST['slug']);
									if(strpos($slug, '.')!==TRUE) {
										$slug = $slug;
									} else {
										$slug = explode('.',$slug);
										$slug = $slug[0].$page_cat_slug.'.'.$slug[1];
									}
								} else {
									$slug = $sanitize->clean($_POST['title']).$page_cat_slug.'.html';
								}
							} else {
								if($_POST['slug']!=''){
									$slug = $sanitize->clean($_POST['slug']);
								} else {
									$slug = $sanitize->clean($_POST['title']).'.html';
								}
							}
							/* page slug ki ramayan ends here */

							$menu_position = implode(',',$_POST['menu_position']);

							$values = array(
								'page_category_id' 	=> 	$page_category,
								'page_template_id' 	=> 	$page_template_id,
								'menu_name' 		=> 	$menu_name,
								'menu_name_alt' 	=> 	$_POST['menu_name_alt'],
								'menu_position' 	=> 	$menu_position,
								'menu_sort_order' 	=> 	$_POST['menu_sort_order'],
								'slug' 				=> 	$slug,
								'title' 			=> 	$_POST['title'],
								'content' 			=> 	$_POST['content'],
								'featured_image' 	=> 	$featured_image,
								'meta_title' 		=> 	$meta_title,
								'meta_description' 	=> 	$_POST['meta_description'],
								'meta_keywords' 	=> 	strtolower($_POST['meta_keywords']),
								'last_updated' 		=> 	today(),
								'status' 			=> 	$_POST['status']
							);
							
							if(isset($_GET['action']) AND $_GET['action'] == 'edit'){
								$Db->update('pages',$values, array( 'id=' => $_GET['id'] ));
							} else {
								$Db->insert('pages',$values);
							}

							generate_sitemap();

							redirect('pages.html');
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
									if(isset($_GET['action']) AND isset($_GET['templates'])){
										$Db->update('page_templates',$values, array( 'id=' => $_GET['id'] ));
									} else {
										$Db->insert('page_templates',$values);	
									}

									redirect('page.html?templates');
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