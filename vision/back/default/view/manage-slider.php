<?php top_navigation(); ?>
<div class="container-fluid" id="content">
	<?php left_sidebar(); ?>
	<div id="main">
		<div class="container-fluid">
			<div class="page-header">
				<?php
				if(isset($_GET['action']) && $_GET['action']=='edit'){
					$page_action = 'Edit Slider';
					$sliders_data = Db::select('sliders',array( 'id=' => $_GET['id']));
					foreach($sliders_data as $slider_data){
						extract($slider_data);
					}
				} else {
					$page_action = 'Add Slider';
				}
				?>
				<div class="pull-left"><h1><?php echo $page_action; ?></h1></div>
				<?php sub_header(); ?>
			</div>
			<div class="breadcrumbs">
				<ul>
					<li><a href="dashboard.html">Home</a><i class="icon-angle-right"></i></li>
					<li><a href="home-slider.html">Home Slider</a><i class="icon-angle-right"></i></li>
					<li><a href="manage-slider.html">Manage Home Slider</a></li>
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
											<select name="slider_category_id" id="slider_category_id" class='chosen-select'>
												<option value=""></option>
												<?php 
												$categories = Db::select('slider_categories');
												foreach($categories as $category) {
												?>
												<option value="<?php echo $category['id'];?>" <?php if(isset($_GET['id']) && $slider_category_id==$category['id']) echo ' selected ';  ?>><?php echo @$category['name'];?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label for="menu_name" class="control-label">Slider Name</label>
									<div class="controls">
										<input type="text" name="name" id="name" value="<?php if(isset($_GET['id'])) echo $name; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
									</div>
								</div>
								<div class="control-group">
									<label for="textfield" class="control-label">Gallery Image</label>
									<div class="controls">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
												<?php 
												if(isset($_GET['id']) && $image!='') {
												?>
												<img src="<?php echo DATA_VISION; ?>/slider/<?php echo $image; ?>" />
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
													<input type="file" name='image' />
												</span>
												<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												<?php if(isset($image)) { ?>
												<input class="btn" type="submit" name="remove_image" value="Remove Image" />
												<?php } ?>
												<?php
												if(isset($_POST['remove_image'])){
													Db::update('sliders',array( 'image' => '' ),array( 'id=' => $_GET['id'] ));
													$url ='manage-slider.html?action=edit&id='.$_GET['id'];
													Helper::redirect($url);
												}
												?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label for="textfield" class="control-label">Slider Description</label>
									<div class="controls">
									<a href="#media-manager" data-toggle="modal" class="btn btn-primary"><i class="icon-picture"></i> Add Media</a><br/><br/>
										<textarea name="description" class='ckeditor span12' rows="5" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $description; ?></textarea>
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
								if($_FILES['image']['name']!=''){
									$image = Upload::image($_FILES['image'], DATA_VISION.'/slider/');
								} else {
									$image = $image;
								}
							} else {
								$image = Upload::image($_FILES['image'], DATA_VISION.'/slider/');
							}
							
							$values = array(
								'slider_category_id' => $_POST['slider_category_id'],
								'name' => $_POST['name'],
								'image' => $image,
								'description' => $_POST['description'],
								'status' => $_POST['status']
							);

							if(isset($_GET['action'])){
								Db::update('slider',$values,array( 'id=' => $_GET['id'] ));
							} else {
								Db::insert('slider',$values);	
							}
							
							redirect("home-slider.html");
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>