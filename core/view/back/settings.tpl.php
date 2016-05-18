<div class="row-fluid">
	<div class="span12">
		<div class="box box-bordered box-color lightgrey">
			<div class="box-title"><h3><i class="icon-reorder"></i> General Settings</h3></div>
			<div class="box-content nopadding">
				<div class="tabs-container">
					<ul class="tabs tabs-inline tabs-left">
						<li class='active'><a href="#first" data-toggle='tab'><i class="icon-info-sign"></i> Information</a></li>
						<li><a href="#second" data-toggle='tab'><i class="glyphicon-picture"></i> Media</a></li>
						<li><a href="#thirds" data-toggle='tab'><i class="glyphicon-settings"></i> Settings</a></li>
					</ul>
				</div>
				<div class="tab-content tab-content-inline">
					<div class="tab-pane active" id="first">
						<div class="box-content nopadding">
							<form method="POST" class='form-horizontal form-bordered form-wysiwyg' >
								<div class="control-group">
									<label for="email" class="control-label">Email</label>
									<div class="controls">
										<input type="text" name="email" id="email" value="<?php echo $email; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="8">
									</div>
								</div>
								<div class="control-group">
									<label for="landline" class="control-label">Landline</label>
									<div class="controls">
										<input type="text" name="landline" id="landline" value="<?php echo $landline; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="7">
									</div>
								</div>
								<div class="control-group">
									<label for="mobile" class="control-label">Mobile</label>
									<div class="controls">
										<input type="text" name="mobile" id="mobile" value="<?php echo $mobile; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="10">
									</div>
								</div>
								<div class="control-group">
									<label for="address" class="control-label">Address</label>
									<div class="controls">
										<textarea name="address" id="address" rows="5" style="width:300px;" class="input-block-level" data-rule-required="true" data-rule-minlength="2"><?php echo $address; ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label for="google_analytics" class="control-label">Google Analytics</label>
									<div class="controls">
										<textarea name="google_analytics" id="google_analytics" rows="5" style="width:300px;" class="input-block-level" data-rule-required="true" data-rule-minlength="2"><?php echo $google_analytics; ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label for="google_webmaster" class="control-label">Google Webmaster</label>
									<div class="controls">
										<textarea name="google_webmaster" id="google_webmaster" rows="5" style="width:300px;" class="input-block-level" data-rule-required="true" data-rule-minlength="2"><?php echo $google_webmaster; ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label for="about" class="control-label">About</label>
									<div class="controls">
										<textarea name="about" id="about" rows="5" style="width:300px;" class="input-block-level" data-rule-required="true" data-rule-minlength="2"><?php echo $about; ?></textarea>
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn btn-primary" name="save_information">Save changes</button>
								</div>
							</form>
							<?php
							if(isset($_POST['save_information'])) {
								$Db = new Db;
								$values = array(
									'email' => $_POST['email'],
									'landline' => $_POST['landline'],
									'mobile' => $_POST['mobile'],
									'address' => $_POST['address'],
									'google_analytics' => $_POST['google_analytics'],
									'google_webmaster' => $_POST['google_webmaster'],
									'about' => $_POST['about'],
								);
								foreach($values as $key=>$value){
									$Db->update('settings',array('value' => $value), array( 'name=' => $key ));
								}
								redirect('settings.html');
							}
							?>
						</div>
					</div>
					<div class="tab-pane" id="second">
						<div class="box-content nopadding">
							<form method="POST" class='form-horizontal form-bordered form-wysiwyg ' enctype='multipart/form-data'>
								<div class="control-group">
									<label for="favicon" class="control-label">Favicon</label>
									<div class="controls">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
												<?php 
												if($favicon!='') {
												?>
												<img src=<?php echo DATA_VIEW; ?>"/general/<?php echo $favicon; ?>" />
												<?php
												} else {
												?>
												<img src="<?php echo BACK_VIEW; ?>/img/no_image.gif" />
												<?php } ?>
											</div>
											<div class="fileupload-preview fileupload-exists thumbnail" style="max-width:200px; max-height:150px; line-height:20px;"></div>
											<div>
												<span class="btn btn-file">
													<span class="fileupload-new">Select image</span>
													<span class="fileupload-exists">Change</span>
													<input type="file" name='favicon' />
												</span>
												<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												<?php if(isset($favicon)) { ?>
												<input class="btn" type="submit" name="remove_favicon" value="Remove Favicon" />
												<?php } ?>
												<?php
												if(isset($_POST['remove_favicon'])){
													$Db = new Db;
													$Db->update('settings',array( 'value' => '' ),array( 'favicon=' => $favicon ));
													$remove_file1 = DATA_PATH.'/general/'.$favicon;
													@unlink($remove_file1);
													redirect('settings.html');
												}
												?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label for="logo" class="control-label">Logo</label>
									<div class="controls">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
												<?php 
												if($logo!='') {
												?>
												<img src=<?php echo DATA_VIEW; ?>"/general/<?php echo $logo; ?>" />
												<?php
												} else {
												?>
												<img src="<?php echo BACK_VIEW; ?>/img/no_image.gif" />
												<?php } ?>
											</div>
											<div class="fileupload-preview fileupload-exists thumbnail" style="max-width:200px; max-height:150px; line-height:20px;"></div>
											<div>
												<span class="btn btn-file">
													<span class="fileupload-new">Select image</span>
													<span class="fileupload-exists">Change</span>
													<input type="file" name='favicon' />
												</span>
												<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												<?php if(isset($logo)) { ?>
												<input class="btn" type="submit" name="remove_logo" value="Remove Logo" />
												<?php } ?>
												<?php
												if(isset($_POST['remove_logo'])){
													$Db = new Db;
													$Db->update('settings',array( 'value' => '' ),array( 'logo=' => $logo ));
													$remove_file1 = DATA_PATH.'/general/'.$logo;
													@unlink($remove_file1);
													redirect('settings.html');
												}
												?>
											</div>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn btn-primary" name="save_media">Save changes</button>
									<button type="button" class="btn" onClick="history.go(-1);">Cancel</button>
								</div>
							</form>
							<?php
							if(isset($_POST['save_media'])){
								if(isset($_GET['action'])) {
									if($_FILES['featured_image']['name']!=''){
										$featured_image = $upload->image($_FILES['featured_image'], DATA_PATH.'/pages/original/');
										$old_image_path = DATA_PATH.'/pages/original/' . $featured_image;
										$new_image_path = DATA_PATH.'/pages/' . $featured_image;
										$mage->resize('crop',$old_image_path,$new_image_path,225,220);
									} else {
										$featured_image = $featured_image;
									}
								} else {
									$featured_image = $upload->image($_FILES['featured_image'], DATA_PATH.'/pages/');
									$old_image_path = DATA_PATH.'/pages/original/' . $featured_image;
									$new_image_path = DATA_PATH.'/pages/' . $featured_image;
									$image->resize('crop',$old_image_path,$new_image_path,225,220);
								}

								$values = array(
									'page_category_id' 	=> 	$_POST['page_category_id'],
									'page_template_id' 	=> 	$_POST['page_template_id'],
									'menu_name' 		=> 	$_POST['menu_name'],
									'menu_name_alt' 	=> 	$_POST['menu_name_alt'],
									'menu_position' 	=> 	$_POST['menu_position'],
									'menu_sort_order' 	=> 	$_POST['menu_sort_order'],
									'slug' 				=> 	$sanitize->clean($_POST['slug']),
									'title' 			=> 	$_POST['title'],
									'content' 			=> 	$_POST['content'],
									'featured_image' 	=> 	$featured_image,
									'meta_title' 		=> 	$_POST['meta_title'],
									'meta_description' 	=> 	$_POST['meta_description'],
									'meta_keywords' 	=> 	strtolower($_POST['meta_keywords']),
									'last_updated' 		=> 	date("Y-m-d"),
									'status' 			=> 	$_POST['status']
								);
								$Db = new Db;
								if(isset($_GET['action']) AND $_GET['action'] == 'edit'){
									$Db->update('pages',$values, array( 'id=' => $_GET['id'] ));
								} else {
									$Db->insert('pages',$values);	
								}
								redirect('pages.html');
							}
							?>
						</div>
					</div>
					<div class="tab-pane" id="thirds">
						<div class="box-content nopadding">
							<form method="POST" class='form-horizontal form-bordered form-wysiwyg ' enctype='multipart/form-data'>
								<div class="control-group">
									<label for="email" class="control-label">Email</label>
									<div class="controls">
										<input type="text" name="email" id="email" value="<?php if(isset($_GET['id'])) echo $email; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
									</div>
								</div>
								<div class="control-group">
									<label for="page_category_id" class="control-label">Parent Category</label>
									<div class="controls">
										<div class="input-xlarge">
											<select name="page_category_id" id="page_category_id" class='chosen-select'>
												<option value=""></option>
												<?php if(empty($pages)) $pages = array();
												foreach($pages as $page_category) { ?>
												<option value="<?php echo $page_category['id'];?>" <?php if(isset($_GET['id']) && $page_category_id==$page_category['id']) echo ' selected ';  ?>><?php echo @$page_category['menu_name'];?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label for="menu_position" class="control-label">Menu Position</label>
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
									<label for="title" class="control-label">Page Name</label>
									<div class="controls">
										<input type="text" name="title" id="title" value="<?php if(isset($_GET['id'])) echo $title; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2">
										<span class="help-block">This will be shown on pages.</span>
									</div>
								</div>
								<div class="control-group">
									<label for="meta_description" class="control-label">Meta Description</label>
									<div class="controls">
										<textarea name="meta_description" id="meta_description" rows="5" style="width:300px;" class="input-block-level" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $meta_description; ?></textarea>
										<span class="help-block">Please enter meta description.</span>
									</div>
								</div>
								<div class="control-group">
									<label for="meta_keywords" class="control-label">Meta Keywords</label>
									<div class="controls">
										<div class="span12">
											<input type="text" name="meta_keywords" id="meta_keywords" value="<?php if(isset($_GET['id'])) echo $meta_keywords; ?>" class="tagsinput" value="tutorial,education" data-rule-required="true" data-rule-minlength="2">
										</div>
									</div>
								</div>
								<div class="control-group">
									<label for="featured_image" class="control-label">Featured Image</label>
									<div class="controls">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
												<?php 
												if(isset($_GET['id']) && $featured_image!='') {
												?>
												<img src=<?php echo DATA_VIEW; ?>"/pages/<?php echo $featured_image; ?>" />
												<?php
												} else {
												?>
												<img src="<?php echo BACK_VIEW; ?>/img/no_image.gif" />
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
									<button type="submit" class="btn btn-primary" name="add_page">Save changes</button>
									<button type="button" class="btn" onClick="history.go(-1);">Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>