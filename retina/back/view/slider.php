<?php echo $navigation; ?>
<div class="container-fluid" id="content">
	<?php echo $left_sidebar; ?>
	<div id="main">
		<div class="container-fluid">
			<?php echo $sub_header; ?>
			<div class="breadcrumbs">
				<ul>
					<li><a href="dashboard.html">Home</a><i class="icon-angle-right"></i></li>
					<li><a href="slider.html?home">Slider Management</a><i class="icon-angle-right"></i></li>
					<li><a href="slider.html?home=add">Add Slider</a></li>
				</ul>
				<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
			</div>
			<?php if(isset($_GET['home']) AND !isset($_GET['id']) AND $_GET['home']!='add') {?>
			<div class="row-fluid">
				<div class="span12">
					<div class="box box-color box-bordered">
						<div class="box-title"><h3>Slider Management</h3></div>
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
									<?php foreach($sliders as $slider) { ?>
									<tr>
										<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
										<td><?php echo $slider['id']; ?></td>
										<td><?php echo category_name('slider_categories',$slider['slider_category_id']); ?></td>
										<td><?php echo $slider['name']; ?></td>
										<td><img width="100" height="100" src="<?php echo DATA_VISION; ?>/slider/<?php echo $slider['image']; ?>" /></td>
										<td class='hidden-350'><?php echo status($slider['status']); ?></td>
										<td class='hidden-480'>
											<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
											<a href="slider.html?home&action=edit&id=<?php echo $slider['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
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
			<?php } ?>
			<?php if(isset($_GET['home']) AND isset($_GET['id']) OR isset($_GET['home']) AND $_GET['home']=='add') { ?>
			<div class="row-fluid">
				<div class="span12">
					<div class="box box-color box-bordered">
						<div class="box-title"><h3><i class="icon-th-list"></i>Manage Slider</h3></div>
						<div class="box-content nopadding">
							<?php
							foreach($edit_data as $edit){}
								extract($edit);
							?>
							<form method="POST" class='form-horizontal form-bordered form-wysiwyg ' enctype='multipart/form-data'>
								<div class="control-group">
									<label for="textfield" class="control-label">Category</label>
									<div class="controls">
										<div class="input-xlarge">
											<select name="slider_category_id" id="slider_category_id" class='chosen-select'>
												<option value=""></option>
												<?php 
												foreach($slider_categories as $category) {
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
													$Db = new Db;
													$Db->update('sliders',array( 'image' => '' ), array( 'id=' => $_GET['id'] ));
													$remove_file1 = DATA_PATH.'/slider/'.$image;
													$remove_file2 = DATA_PATH.'/slider/'.$image;
													@unlink($remove_file1);
													@unlink($remove_file2);
													$url ='slider.html?home&action=edit&id='.$_GET['id'];
													redirect($url);
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
										<textarea name="description" class='span6' rows="5" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $description; ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label for="textfield" class="control-label">Status</label>
									<div class="controls">
										<div class="check-demo-col">
											<div class="check-line">
												<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="1" <?php if(isset($_GET['id']) && $status==1) echo ' checked '; else echo ' checked'; ?>> <label class='inline' for="status">Enable</label>
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
									$remove_file1 = DATA_PATH.'/slider//'.$image;
									$remove_file2 = DATA_PATH.'/slider/'.$image;
									@unlink($remove_file1);
									@unlink($remove_file2);

									$image = $upload->image($_FILES['image'], DATA_PATH.'/slider/');
								} else {
									$image = $image;
								}
							} else {
								$remove_file1 = DATA_PATH.'/slider//'.$image;
								$remove_file2 = DATA_PATH.'/slider/'.$image;
								@unlink($remove_file1);
								@unlink($remove_file2);

								$image = $upload->image($_FILES['image'], DATA_PATH.'/slider/');
							}
							
							$values = array(
								'slider_category_id' => $_POST['slider_category_id'],
								'name' => $_POST['name'],
								'image' => $image,
								'description' => $_POST['description'],
								'status' => $_POST['status']
							);
							$Db = new Db;
							if(isset($_GET['action'])){
								$Db->update('sliders',$values,array( 'id=' => $_GET['id'] ));
							} else {
								$Db->insert('sliders',$values);
							}
							
							redirect("slider.html?home");
						}
						?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>