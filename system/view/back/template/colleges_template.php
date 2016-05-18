<?php if(!isset($_GET['action']) AND !isset($_GET['id'])) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-riflescope"></i>Colleges Management</h3></div>
			<div class="box-content nopadding">
				<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
					<thead>
						<tr class='thefilter'>
							<th class='with-checkbox'></th>
							<th>ID</th>
							<th>College Name</th>
							<th>Slug</th>
							<th>Contact Number</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
						<tr>
							<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
							<th>ID</th>
							<th>College Name</th>
							<th>Slug</th>
							<th>Contact Number</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($colleges as $college) { ?>
						<tr>
							<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
							<td><?php echo $college['id']; ?></td>
							<td><?php echo $college['title']; ?></td>
							<td><?php echo $college['slug']; ?></td>
							<td><?php echo $college['contact_number']; ?></td>
							<td class='hidden-350'><?php echo status($college['status']); ?></td>
							<td class='hidden-480'>
								<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
								<a href="colleges.html?action=edit&id=<?php echo $college['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
								<a href="#" class="btn" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php if(isset($_GET['action'])) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-riflescope"></i><?php echo ucfirst($_GET['action']);?></h3></div>
			<div class="box-content nopadding">
				<?php
				foreach($edit_data as $edit){}
					extract($edit);
				?>
				<form method="POST" class='form-horizontal form-bordered form-wysiwyg' enctype='multipart/form-data'>
					<div class="control-group">
						<label for="page_id" class="control-label">Parent Category</label>
						<div class="controls">
							<div class="input-large">
								<select name="page_id" id="page_id" class='chosen-select'>
									<option value=""></option>
									<?php
									foreach($college_pages as $page_category) { 
										$Db = new Db;
										$cat_names = $Db->select('pages',array('id=' => $page_category['page_category_id']));
										foreach($cat_names as $cat_name){ }
									?>
									<option value="<?php echo $page_category['id'];?>" <?php if(isset($_GET['id']) AND $page_id==$page_category['id']) echo ' selected ';  ?>><?php echo $cat_name['menu_name']; ?> > <?php echo $page_category['menu_name'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="title" class="control-label">College Name</label>
						<div class="controls">
							<input type="text" name="title" id="title" value="<?php if(isset($_GET['id'])) echo $title; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<div class="control-group">
						<label for="address" class="control-label">Address</label>
						<div class="controls">
							<textarea name="address" id="address" rows="5" style="width:300px;" class="input-block-level" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $address; ?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label for="contact_number" class="control-label">Contact Number</label>
						<div class="controls">
							<input type="text" name="contact_number" id="contact_number" value="<?php if(isset($_GET['id'])) echo $contact_number; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<!-- <div class="control-group">
						<label for="textfield" class="control-label">Expirty Date</label>
						<div class="controls">
							<input type="text" name="end_date" id="end_date" class="input-medium datepick" value="<?php if(isset($_GET['id'])) echo $end_date; ?>">
							<span class="help-block">Job ending date.</span>
						</div>
					</div> -->
					<div class="control-group">
						<label for="meta_title" class="control-label">Meta Title</label>
						<div class="controls">
							<input type="text" name="meta_title" id="meta_title" value="<?php if(isset($_GET['id'])) echo $meta_title; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2">
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
						<label for="featured_image" class="control-label">Image</label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
									<?php 
									if(isset($_GET['id']) AND $featured_image!='') {
									?>
									<img src="<?php echo DATA_VISION; ?>/colleges/<?php echo $featured_image; ?>" />
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
									<?php if(isset($featured_image) AND $featured_image!='') { ?>
									<input class="btn" type="submit" name="remove_image" value="Remove Image" />
									<?php } ?>
									<?php
									if(isset($_POST['remove_image'])){
										$Db = new Db;
										$Db->update('colleges',array( 'featured_image' => ''	),array( 'id=' => $_GET['id'] ));
										$url ='colleges.html?action=edit&id='.$_GET['id'];
										redirect($url);
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="about" class="control-label">About</label>
						<div class="controls">
							<textarea name="about" class='ckeditor span12' rows="5" data-rule-required="true"><?php if(isset($_GET['id'])) echo $about; ?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label for="courses" class="control-label">Courses</label>
						<div class="controls">
							<textarea name="courses" class='ckeditor span12' rows="5" data-rule-required="true"><?php if(isset($_GET['id'])) echo $courses; ?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label for="content" class="control-label">Description</label>
						<div class="controls">
							<textarea name="content" class='ckeditor span12' rows="5" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $content; ?></textarea>
						</div>
					</div>

					<div class="control-group">
						<label for="status" class="control-label">Status</label>
						<div class="controls">
							<div class="check-demo-col">
								<div class="check-line">
									<input type="radio" id="status" name="status" class='icheck-me' data-skin="square" data-color="blue" value="1" <?php if(isset($_GET['id']) && $status==1) echo ' checked ';  ?>> <label class='inline' for="status">Enable</label>
								</div>
								<div class="check-line">
									<input type="radio" id="status" name="status" class='icheck-me' data-skin="square" data-color="blue" value="0" <?php if(isset($_GET['id']) && $status==0) echo ' checked ';  ?>> <label class='inline' for="status">Disable</label>
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
					if($_FILES['featured_image']['name']!=''){
						$featured_image = $upload->image($_FILES['featured_image'], DATA_PATH.'/colleges/');
					} else {
						$featured_image = $featured_image;
					}
				} else {
					$featured_image = $upload->image($_FILES['featured_image'], DATA_PATH.'/colleges/');
				}
				$slug = $sanitize->clean($_POST['title']).'.html';
				$values = array(
					'post_date' => date('Y-m-d'),
					//'end_date' => $_POST['end_date'],
					//'state_id' => $_POST['state_id'],
					'page_id' => $_POST['page_id'],
					'contact_number' => $_POST['contact_number'],
					'address' => $_POST['address'],
					'slug' => $slug,
					'title' => $_POST['title'],
					'content' => $_POST['content'],
					'featured_image' => $featured_image,
					'about' => $_POST['about'],
					'courses' => $_POST['courses'],
					'meta_title' => $_POST['meta_title'],
					'meta_description' => $_POST['meta_description'],
					'meta_keywords' => strtolower($_POST['meta_keywords']),
					'sort_order' => 0,
					'status' => $_POST['status'],
				);
				$Db = new Db;
				if(isset($_GET['action']) AND $_GET['action']=='edit'){
					$Db->update('colleges',$values,array( 'id=' => $_GET['id'] ));
				} else {
					$Db->insert('colleges',$values);	
				}
				//redirect("colleges.html");
			}
			?>
		</div>
	</div>
</div>
<?php } ?>