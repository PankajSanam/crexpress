<?php if(!isset($_GET['action']) AND !isset($_GET['category'])){ ?>
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
						<?php foreach($galleries as $gall) { ?>
						<tr>
							<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
							<td><?php echo $gall['id']; ?></td>
							<td><?php echo $model->category_name($gall['gallery_category_id']); ?></td>
							<td><?php echo $gall['gallery_name']; ?></td>
							<td><img width="100" height="100" src="<?php echo DATA_VIEW.'/gallery/thumbnail/'.$gall['gallery_image']; ?>" /></td>
							<td class='hidden-350'><?php echo status($gall['status']); ?></td>
							<td class='hidden-480'>
								<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
								<a href="gallery.html?action=edit&id=<?php echo $gall['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
								<a href="gallery.html?delete=<?php echo $encrypt->lock($gall['id']); ?>" onclick="return ConfirmDelete();" class="btn" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
							</td>
						</tr>
						<?php 
						}
						?>
					</tbody>
				</table>
				<?php 
				if( isset($_GET['delete']) ){
					$enc_id = trim($_GET['delete']);
					$id = $encrypt->unlock($enc_id);

					if($gallery->delete_gallery($id)){
						redirect('gallery.html');
					} else {
						alert('This item cannot be deleted.');
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php } if(isset($_GET['action']) AND !isset($_GET['category'])) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-th-list"></i> <?php echo ucfirst($_GET['action']);?> Gallery</h3></div>
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
								<select name="gallery_category_id" id="gallery_category_id" class='chosen-select'>
									<option value=""></option>
									<?php 
									foreach($categories as $category) {
									?>
									<option value="<?php echo $category['id'];?>" <?php if(isset($_GET['id']) && $gallery_category_id==$category['id']) echo ' selected ';  ?>><?php echo $category['name'];?></option>
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
									<img src="<?php echo DATA_VIEW; ?>/gallery/thumbnail/<?php echo $gallery_image; ?>" />
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
										<input type="file" name='gallery_image' />
									</span>
									<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
									<?php if(isset($_GET['action']) AND $_GET['action']=='edit' AND isset($gallery_image)) { ?>
									<input class="btn" type="submit" name="remove_image" value="Remove Image" />
									<?php } ?>
									<?php
									if(isset($_POST['remove_image'])){
										$Db = new Db;
										$Db->update('gallery',array( 'gallery_image' => '' ),array( 'id=' => $_GET['id'] ));
										$url ='gallery.html?action=edit&id='.$_GET['id'];
										redirect($url);
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Gallery Video</label>
						<div class="controls">
							<textarea name="gallery_video" rows="5">
								<?php if(isset($_GET['id'])) echo $gallery_video; ?>
							</textarea>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Gallery Description</label>
						<div class="controls">
<!--						<a href="#media-manager" data-toggle="modal" class="btn btn-primary"><i class="icon-picture"></i> Add Media</a><br/><br/>-->
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
									<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="1" <?php if(isset($_GET['id']) AND $status==1) echo ' checked '; else echo ' checked ';  ?>> <label class='inline' for="status">Enable</label>
								</div>
								<div class="check-line">
									<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="0" <?php if(isset($_GET['id']) AND $status==0) echo ' checked ';  ?>> <label class='inline' for="status">Disable</label>
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
						$gallery_image = $upload->image($_FILES['gallery_image'], DATA_PATH.'/gallery/');
						$old_image_path = DATA_PATH.'/gallery/' . $gallery_image;
						$new_image_path = DATA_PATH.'/gallery/thumbnail/' . $gallery_image;
						$image->resize('max',$old_image_path,$new_image_path,140,140);

					} else {
						$gallery_image = $gallery_image;
					}
				} else {
					$gallery_image = $upload->image($_FILES['gallery_image'], DATA_PATH.'/gallery/');
					$old_image_path = DATA_PATH.'/gallery/' . $gallery_image;
					$new_image_path = DATA_PATH.'/gallery/thumbnail/' . $gallery_image;
					$image->resize('max',$old_image_path,$new_image_path,140,140);
				}

				$values = array(
					'gallery_category_id'	=>	$_POST['gallery_category_id'],
					'gallery_name'			=>	$_POST['gallery_name'],
					'gallery_image'			=>	$gallery_image,
					'gallery_video'			=>	$_POST['gallery_video'],
					'gallery_description'	=>	$_POST['gallery_description'],
					'status'				=>	$_POST['status']
				);

				$Db = new Db;

				if(isset($_GET['action']) AND $_GET['action'] == 'edit' ){
					$Db->update('gallery',$values, array( 'id=' => $_GET['id'] ));
				} else {
					$Db->insert('gallery',$values);	
				}

				redirect("gallery.html");
			}
			?>
		</div>
	</div>
</div>
<?php } if(isset($_GET['category'])) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3>Category Manager</h3></div>
			<div class="box-content ">
				<div class="grids">
					<div class="span4">
						<?php
						if(isset($_GET['action'])){
							$Db = new Db;
							$gallery_categories = $Db->select('gallery_categories',array( 'id=' => $_GET['id']) );
							foreach($gallery_categories as $gallery_category){
								extract($gallery_category);
							}
						}
						?>
						<form method="POST" enctype='multipart/form-data'>
							<div class="control-group">
								<label for="textfield" class="control-label">Category Name</label>
								<div class="controls">
									<input type="text" name="name" id="name" value="<?php if(isset($_GET['action'])) echo $name; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2">
								</div>
							</div>
							<button type="submit" class="btn btn-primary" name="save">Save</button>
						</form>
					</div>
					<?php
					if(isset($_POST['save'])){
						$slug = $sanitize->clean($_POST['name']);
						$values = array( 
							'name' => $_POST['name'],
							'slug' => $slug,
						);

						$Db = new Db;
						if(isset($_GET['action']) AND isset($_GET['category'])){
							$Db->update('gallery_categories',$values, array( 'id=' => $_GET['id'] ));
						} else {
							$Db->insert('gallery_categories',$values);	
						}

						redirect('gallery.html?category');
					}
					?>
					<div class="span8">
						<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
							<thead>
								<tr class='thefilter'>
									<th class='with-checkbox'></th>
									<th>ID</th>
									<th>Category Name</th>
									<th>Slug</th>
									<th class='hidden-480'>Options</th>
								</tr>
								<tr>
									<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
									<th>ID</th>
									<th>Category Name</th>
									<th>Slug</th>
									<th class='hidden-480'>Options</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($categories as $category){ ?>
								<tr>
									<td class="with-checkbox"><input type="checkbox" name="check" value="<?php echo $category['id']; ?>"></td>
									<td><?php echo $category['id']; ?></td>
									<td><?php echo $category['name']; ?></td>
									<td><?php echo $category['slug']; ?></td>
									<td class='hidden-480'>
										<!-- <a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a> -->
										<a href="gallery.html?category&action=edit&id=<?php echo $category['id']; ?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
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