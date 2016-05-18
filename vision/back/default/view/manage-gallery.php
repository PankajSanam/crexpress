<?php top_navigation(); ?>
<div class="container-fluid" id="content">
	<?php left_sidebar(); ?>
	<div id="main">
		<div class="container-fluid">
			<div class="page-header">
				<?php
				if(isset($_GET['action']) && $_GET['action']=='edit'){
					$page_action = 'Edit Gallery';
					$pages_data = Db::select('gallery',array( 'id=' => $_GET['id']));
					foreach($pages_data as $page_data){
						extract($page_data);
					}
				} else {
					$page_action = 'Add Gallery';
				}
				?>
				<div class="pull-left"><h1><?php echo $page_action; ?></h1></div>
				<?php sub_header(); ?>
			</div>
			<div class="breadcrumbs">
				<ul>
					<li><a href="dashboard.html">Home</a><i class="icon-angle-right"></i></li>
					<li><a href="gallery.html">Gallery</a><i class="icon-angle-right"></i></li>
					<li><a href="manage-gallery.html">Manage Gallery</a></li>
				</ul>
				<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box box-color box-bordered">
						<div class="box-title"><h3><i class="icon-th-list"></i> <?php echo $page_action; ?></h3></div>
						<div class="box-content nopadding">
							<form method="POST" class='form-horizontal form-bordered form-wysiwyg ' enctype='multipart/form-data'>
								<div class="control-group">
									<label for="textfield" class="control-label">Category</label>
									<div class="controls">
										<div class="input-xlarge">
											<select name="gallery_category_id" id="gallery_category_id" class='chosen-select'>
												<option value=""></option>
												<?php 
												$categories = Db::select('gallery_categories');
												foreach($categories as $category) {
												?>
												<option value="<?php echo $category['id'];?>" <?php if(isset($_GET['id']) && $gallery_category_id==$category['id']) echo ' selected ';  ?>><?php echo @$category['name'];?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label for="menu_name" class="control-label">Gallery Name</label>
									<div class="controls">
										<input type="text" name="gallery_name" id="gallery_name" value="<?php if(isset($_GET['id'])) echo $gallery_name; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
									</div>
								</div>
								<div class="control-group">
									<label for="textfield" class="control-label">Gallery Image</label>
									<div class="controls">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
												<?php 
												if(isset($_GET['id']) && $gallery_image!='') {
												?>
												<img src="<?php echo DATA_VISION; ?>/gallery/<?php echo $gallery_image; ?>" />
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
													<input type="file" name='gallery_image' />
												</span>
												<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												<?php if(isset($gallery_image)) { ?>
												<input class="btn" type="submit" name="remove_image" value="Remove Image" />
												<?php } ?>
												<?php
												if(isset($_POST['remove_image'])){
													Db::update('gallery',array( 'gallery_image' => '' ),array( 'id=' => $_GET['id'] ));
													$url ='manage-gallery.html?action=edit&id='.$_GET['id'];
													Helper::redirect($url);
												}
												?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label for="textfield" class="control-label">Gallery Description</label>
									<div class="controls">
									<a href="#media-manager" data-toggle="modal" class="btn btn-primary"><i class="icon-picture"></i> Add Media</a><br/><br/>
										<textarea name="gallery_description" class='ckeditor span12' rows="5" data-rule-required="true" data-rule-minlength="2">
											<?php if(isset($_GET['id'])) echo $gallery_description; ?>
										</textarea>
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
									<button type="submit" class="btn btn-primary" name="save">Save changes</button>
									<button type="button" class="btn" onClick="history.go(-1);">Cancel</button>
								</div>
							</form>
						</div>
						<?php
						if(isset($_POST['save'])){
							if(isset($_GET['action'])) {
								if($_FILES['gallery_image']['name']!=''){
									$gallery_image = Upload::image($_FILES['gallery_image'], DATA_VISION.'/gallery/');
								} else {
									$gallery_image = $gallery_image;
								}
							} else {
								$gallery_image = Upload::image($_FILES['gallery_image'], DATA_VISION.'/gallery/');
							}
							
							$values = array(
								'gallery_category_id'	=>	$_POST['gallery_category_id'],
								'gallery_name'			=>	$_POST['gallery_name'],
								'gallery_image'			=>	$gallery_image,
								'gallery_description'	=>	$_POST['gallery_description'],
								'status'				=>	$_POST['status']
							);

							if(isset($_GET['action'])){
								Db::update('gallery',$values, array( 'id=' => $_GET['id'] ));
							} else {
								Db::insert('gallery',$values);	
							}
							
							Helper::redirect("gallery.html");
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>