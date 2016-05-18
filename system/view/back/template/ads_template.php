<?php if(!isset($_GET['action']) AND !isset($_GET['category'])){ ?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3>Ads Management</h3></div>
			<div class="box-content nopadding">
				<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
					<thead>
						<tr class='thefilter'>
							<th class='with-checkbox'></th>
							<th>ID</th>
							<th>Position</th>
							<th>Duration</th>
							<th>Image</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
						<tr>
							<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
							<th>ID</th>
							<th>Position</th>
							<th>Duration</th>
							<th>Image</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($ads as $ad) { ?>
						<tr>
							<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
							<td><?php echo $ad['id']; ?></td>
							<td><?php echo $ad['position']; ?></td>
							<td><?php echo $ad['duration']; ?></td>
							<td>
								<a rel="nofollow" href="<?php echo 'http://'.$ad['link'];?>" target="_blank">
								<img width="150" height="100" src="<?php echo DATA_VISION.'/banners/'.$ad['image']; ?>" title="<?php echo $ad['title']; ?>" alt="<?php echo $ad['title']; ?>" />
								</a>
							</td>
							<td class='hidden-350'><?php echo status($ad['status']); ?></td>
							<td class='hidden-480'>
								<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
								<a href="?action=edit&id=<?php echo $ad['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
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
<?php } if(isset($_GET['action'])) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-th-list"></i> <?php echo ucfirst($_GET['action']);?> Ad</h3></div>
			<div class="box-content nopadding">
				<?php
				if(empty($edit_data)) $edit_data = array();
				foreach($edit_data as $edit){}
				@extract($edit);
				?>
				<form method="POST" class='form-horizontal form-bordered form-wysiwyg' enctype='multipart/form-data'>
					<div class="control-group">
						<label for="pages" class="control-label">Select Pages</label>
						<div class="controls">
							<select multiple="multiple" id="pages" name="pages[]" class='multiselect'>
								<?php foreach($all_pages as $page) { ?>
								<option value="<?php echo $page['id'];?>" <?php 
																			if(isset($_GET['id'])) {
																				$pagex = explode(',', $pages);
																				$i = 0;
																				$c = count($pagex) - 1;
																				foreach($pagex as $p) {
																					if($p==$page['id']) {
																						echo ' selected ';
																					}  else {
																						echo '';
																					}
																				}
																				if($i>$c) $i++;
																			}?>><?php echo ($page['menu_name']!='' ? $page['menu_name'] : $page['title']); ?></option>
								<?php  } ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label for="position" class="control-label">Position</label>
						<div class="controls">
							<div class="input-medium">
								<select name="position" id="position" class='chosen-select'>
									<option value=""></option>
									<option value="top" <?php if(isset($_GET['id']) AND $position=='top') echo ' selected '; ?>>Top</option>
									<option value="bottom" <?php if(isset($_GET['id']) AND $position=='bottom') echo ' selected '; ?>>Bottom</option>
									<option value="left" <?php if(isset($_GET['id']) AND $position=='left') echo ' selected '; ?>>Left</option>
									<option value="right" <?php if(isset($_GET['id']) AND $position=='right') echo ' selected '; ?>>Right</option>
									<option value="other" <?php if(isset($_GET['id']) AND $position=='other') echo ' selected '; ?>>Other</option>
								</select>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="duration" class="control-label">Duration</label>
						<div class="controls">
							<input type="text" name="duration" id="duration" value="<?php if(isset($_GET['id'])) echo $duration; ?>" class="input-small" data-rule-required="true" data-rule-minlength="1">
						</div>
					</div>
					<div class="control-group">
						<label for="title" class="control-label">Title</label>
						<div class="controls">
							<input type="text" name="title" id="title" value="<?php if(isset($_GET['id'])) echo $title; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<div class="control-group">
						<label for="image" class="control-label">Image</label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
									<?php if(isset($_GET['id']) AND $image!='') { ?>
									<img src="<?php echo DATA_VISION; ?>/banners/<?php echo $image; ?>" />
									<?php } else { ?>
									<img src="<?php echo BACK_VISION; ?>/img/no_image.gif" />
									<?php } ?>
								</div>
								<div class="fileupload-preview fileupload-exists thumbnail" style="max-width:200px; max-height:150px; line-height:20px;"></div>
								<div>
									<span class="btn btn-file">
										<span class="fileupload-new">Select image</span>
										<span class="fileupload-exists">Change</span>
										<input type="file" name="image" />
									</span>
									<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
									<?php if(isset($_GET['action']) AND $_GET['action']=='edit' AND isset($image)) { ?>
									<input class="btn" type="submit" name="remove_image" value="Remove Image" />
									<?php } ?>
									<?php
									if(isset($_POST['remove_image'])){
										$Db = new Db;
										$Db->update('ads',array( 'image' => '' ),array( 'id=' => $_GET['id'] ));
										$url ='ads.html?action=edit&id='.$_GET['id'];
										redirect($url);
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="link" class="control-label">Link</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on">http://</span>
								<input type="text" name="link" id="link" value="<?php if(isset($_GET['id'])) echo $link; ?>" class="input-large" data-rule-required="true" data-rule-minlength="1" placeholder="www.example.com">
							</div>
							<span class="help-block">E.g. www.google.com (without http://)</span>
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
					if($_FILES['image']['name']!=''){
						$image = $upload->image($_FILES['image'], DATA_PATH.'/banners/');
						//$old_image_path = DATA_PATH.'/gallery/' . $gallery_image;
						//$new_image_path = DATA_PATH.'/gallery/thumbnail/' . $gallery_image;
						//$image->resize('max',$old_image_path,$new_image_path,140,140);

					} else {
						$image = $image;
					}
				} else {
					$image = $upload->image($_FILES['image'], DATA_PATH.'/banners/');
					//$old_image_path = DATA_PATH.'/gallery/' . $gallery_image;
					//$new_image_path = DATA_PATH.'/gallery/thumbnail/' . $gallery_image;
					//$image->resize('max',$old_image_path,$new_image_path,140,140);
				}

				$Db = new Db;
				$pages = implode(',',$_POST['pages']);

				if(isset($_GET['action']) AND $_GET['action'] == 'edit' ){
					$values = array(
						'date'		=>	today(),
						'pages'		=>	$pages,
						'position'	=>	$_POST['position'],
						'duration'	=>	$_POST['duration'],
						'title'		=>	$_POST['title'],
						'image'		=>	$image,
						'link'		=>	$_POST['link'],
						'status'	=>	$_POST['status']
					);
					$Db->update('ads',$values, array( 'id=' => $_GET['id'] ));
				} else {
					$values = array(
						'date'		=>	today(),
						'pages'		=>	$pages,
						'position'	=>	$_POST['position'],
						'duration'	=>	$_POST['duration'],
						'title'		=>	$_POST['title'],
						'image'		=>	$image,
						'link'		=>	$_POST['link'],
						'status'	=>	$_POST['status']
					);
					$Db->insert('ads',$values);	
				}

				redirect("ads.html");
			}
			?>
		</div>
	</div>
</div>
<?php }?>