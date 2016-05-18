<?php top_navigation(); ?>
<div class="container-fluid" id="content">
	<?php left_sidebar(); ?>
	<div id="main">
		<div class="container-fluid">
			<div class="page-header">
				<?php
				if(isset($_GET['action']) && $_GET['action']=='edit'){
					$page_action = 'Edit Social Icons';
					$social_icons = Db::select('social_icons', array( 'id=' => $_GET['id']));
					foreach($social_icons as $social_icon){
						extract($social_icon);
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
					<li><a href="social-icons.html">Social Icons Management</a><i class="icon-angle-right"></i></li>
					<li><a href="manage-social-icons.html">Add Social Icons</a></li>
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
									<label for="menu_name" class="control-label">Social Icon Name</label>
									<div class="controls">
										<input type="text" name="name" id="name" value="<?php if(isset($_GET['id'])) echo $name; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
									</div>
								</div>
								<div class="control-group">
									<label for="textfield" class="control-label">Social Icon Image</label>
									<div class="controls">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
												<?php 
												if(isset($_GET['id']) && $image!='') {
												?>
												<img src=<?php echo DATA_VISION; ?>"/social/<?php echo $image; ?>" />
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
													Db::update('social-icons',array( 'image' => '' ),array( 'id=' => $_GET['id'] ));
													$url ='manage-social-icons.html?action=edit&id='.$_GET['id'];
													Helper::redirect($url);
												}
												?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label for="menu_name" class="control-label">URL</label>
									<div class="controls">
										<input type="text" name="url" id="url" value="<?php if(isset($_GET['id'])) echo $url; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
									</div>
								</div>
								<div class="control-group">
									<label for="menu_name" class="control-label">Link</label>
									<div class="controls">
										<input type="text" name="link" id="link" value="<?php if(isset($_GET['id'])) echo $link; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
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
									$image = Upload::image($_FILES['image'], DATA_VISION.'/social/');
								} else {
									$image = $image;
								}
							} else {
								$image = Upload::image($_FILES['image'], DATA_VISION.'/social/');
							}
							
							$values = array(
								'name' => $_POST['name'],
								'image' => $image,
								'url' => $_POST['url'],
								'link' => $_POST['link'],
								'status' => $_POST['status'],
							);

							if(isset($_GET['action'])){
								Db::update('social_icons',$values,array( 'id=' => $_GET['id'] ));
							} else {
								Db::insert('social_icons',$values);	
							}
							
							Helper::redirect("social-icons.html");
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>