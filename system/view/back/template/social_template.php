<?php if(!isset($_GET['action'])) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-group"></i>Social Icons Management </h3></div>
			<div class="box-content nopadding">
				<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
					<thead>
						<tr class='thefilter'>
							<th class='with-checkbox'></th>
							<th>ID</th>
							<th>Name</th>
							<th>URL</th>
							<th>Link</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
						<tr>
							<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
							<th>ID</th>
							<th>Name</th>
							<th>URL</th>
							<th>Link</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($social_icons as $social_icon) { ?>
						<tr>
							<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
							<td><?php echo $social_icon['id']; ?></td>
							<td>
								<img src="<?php echo DATA_VISION; ?>/social/<?php echo $social_icon['image']; ?>" width="32" />
								<?php echo $social_icon['name']; ?>
							</td>
							<td><?php echo $social_icon['url']; ?></td>
							<td><?php echo $social_icon['link']; ?></td>
							<td class='hidden-350'><?php echo status($social_icon['status']); ?></td>
							<td class='hidden-480'>
								<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
								<a href="social.html?action=edit&id=<?php echo $social_icon['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
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
<?php if(isset($_GET['action'])) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-group"></i><?php echo ucfirst($_GET['action']);?></h3></div>
			<div class="box-content nopadding">
				<?php
				foreach($edit_data as $edit){}
					extract($edit);
				?>
				<form method="POST" class='form-horizontal form-bordered form-wysiwyg ' enctype='multipart/form-data'>
					<div class="control-group">
						<label for="name" class="control-label">Social Icon Name</label>
						<div class="controls">
							<input type="text" name="name" id="name" value="<?php if(isset($_GET['id'])) echo $name; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<div class="control-group">
						<label for="image" class="control-label">Social Icon Image</label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
									<?php 
									if(isset($_GET['id']) && $image!='') {
									?>
									<img src="<?php echo DATA_VISION; ?>/social/<?php echo $image; ?>" />
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
										$Db->update('social-icons',array( 'image' => '' ),array( 'id=' => $_GET['id'] ));
										$url ='social.html?action=edit&id='.$_GET['id'];
										redirect($url);
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="url" class="control-label">URL</label>
						<div class="controls">
							<input type="text" name="url" id="url" value="<?php if(isset($_GET['id'])) echo $url; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<div class="control-group">
						<label for="link" class="control-label">Link</label>
						<div class="controls">
							<input type="text" name="link" id="link" value="<?php if(isset($_GET['id'])) echo $link; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<div class="control-group">
						<label for="sort_order" class="control-label">Sort Order</label>
						<div class="controls">
							<input type="text" name="sort_order" id="sort_order" value="<?php if(isset($_GET['id'])) echo $sort_order; ?>" class="input-small" data-rule-required="true" data-rule-minlength="2">
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
					if($_FILES['image']['name']!=''){
						$image = $Upload->image($_FILES['image'], DATA_PATH.'/social/');
					} else {
						$image = $image;
					}
				} else {
					$image = $upload->image($_FILES['image'], DATA_PATH.'/social/');
				}

				$values = array(
					'name' => $_POST['name'],
					'image' => $image,
					'url' => $_POST['url'],
					'link' => $_POST['link'],
					'sort_order' => $_POST['sort_order'],
					'status' => $_POST['status'],
				);
				$Db = new Db;
				if(isset($_GET['action'])){
					$Db->update('social_icons',$values,array( 'id=' => $_GET['id'] ));
				} else {
					$Db->insert('social_icons',$values);	
				}

				redirect("social.html");
			}
			?>
		</div>
	</div>
</div>
<?php } ?>