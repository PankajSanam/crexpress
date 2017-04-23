<!-- List of all ads begins -->
<?php if( !get('add') && !get('edit') ){ ?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><?php echo $page_title; ?></h3></div>
			<div class="box-content nopadding">
				<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
					<thead>
						<tr class='thefilter'>
							<th class='with-checkbox'></th>
							<th>ID</th>
							<th>Position</th>
							<th>Duration</th>
							<th>Image</th>
							<th>Status</th>
							<th>Options</th>
						</tr>
						<tr>
							<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all" /></th>
							<th>ID</th>
							<th>Position</th>
							<th>Duration</th>
							<th>Image</th>
							<th>Status</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($records as $record) { ?>
						<tr>
							<td class="with-checkbox"><input type="checkbox" name="check" value="1" /></td>
							<td><?php echo $record['id']; ?></td>
							<td><?php echo $record['position']; ?></td>
							<td><?php echo $record['duration']; ?></td>
							<td>
								<a href="<?php echo 'http://'.$record['link'];?>" target="_blank" rel="nofollow">
									<?php echo get_image('banners',$record['image'], 150, 100); ?>
								</a>
							</td>
							<td><?php echo status($record['status']); ?></td>
							<td>
								<a href="<?php echo back_url( 'ads/edit/'.$record['id'] ) ?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
								<a href="<?php echo back_url( 'ads/delete/'.$encrypt->lock($record['id']) ) ?>" onclick="return confirmDelete();" class="btn" title="Delete" rel="tooltip">
                                    <i class="icon-remove"></i>
                                </a>
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
<!-- List of all ads ends -->

<!-- Add / Update ad begins -->
<?php if( get('add') || get('edit') ) { ?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-th-list"></i> Manage Ads</h3></div>
			<div class="box-content nopadding">
				<?php foreach($getRecords as $getRecord){} ?>
				<form method="POST" class='form-horizontal form-bordered form-wysiwyg' enctype='multipart/form-data'>
					<div class="control-group">
						<label for="pages" class="control-label">Select Pages</label>
						<div class="controls">
							<select multiple="multiple" id="pages" name="pages[]" class='multiselect'>
								<?php 
								foreach($activePages as $activePage) 
								{
									$selected = '';
									if( get('edit') ) 
									{
										$pageArray = explode(',', $getRecord['pages']);
										$selected = ( in_array($activePage['id'], $pageArray ) ? 'selected' : '' );
									}
								?>
								<option value="<?php echo $activePage['id'];?>" <?php echo $selected; ?>><?php echo $activePage['menu_name']; ?></option>
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
									<option value="top" <?php if( get('edit') && $getRecord['position']=='top') echo ' selected '; ?>>Top</option>
									<option value="bottom" <?php if( get('edit') && $getRecord['position']=='bottom') echo ' selected '; ?>>Bottom</option>
									<option value="left" <?php if( get('edit') && $getRecord['position']=='left') echo ' selected '; ?>>Left</option>
									<option value="right" <?php if( get('edit') && $getRecord['position']=='right') echo ' selected '; ?>>Right</option>
									<option value="other" <?php if( get('edit') && $getRecord['position']=='other') echo ' selected '; ?>>Other</option>
								</select>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="duration" class="control-label">Duration</label>
						<div class="controls">
							<input type="text" name="duration" id="duration" value="<?php if( get('edit') ) echo $getRecord['duration']; ?>" class="input-small" data-rule-required="true" data-rule-minlength="1" />
						</div>
					</div>
					<div class="control-group">
						<label for="title" class="control-label">Title</label>
						<div class="controls">
							<input type="text" name="title" id="title" value="<?php if( get('edit') ) echo $getRecord['title']; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2" />
						</div>
					</div>
					<div class="control-group">
						<label for="image" class="control-label">Image</label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
									<?php if( get('edit') ) { ?>
										<?php echo get_image('banners',$getRecord['image']); ?>
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
									<?php if( get('edit') && !empty($getRecord['image']) ) { ?>
									<input class="btn" type="submit" name="remove_image" value="Remove Image" />
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="link" class="control-label">Link</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on">http://</span>
								<input type="text" name="link" id="link" value="<?php if( get('edit') ) echo $getRecord['link']; ?>" class="input-large" placeholder="www.example.com" data-rule-required="true" data-rule-minlength="1" />
							</div>
							<span class="help-block">E.g. www.crexo.com (without http://)</span>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Status</label>
						<div class="controls">
							<div class="check-demo-col">
								<div class="check-line">
									<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="1" <?php if( get('edit') && $getRecord['status'] == 1) echo ' checked '; else echo ' checked ';  ?> />
									<label class='inline' for="status">Enable</label>
								</div>
								<div class="check-line">
									<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="0" <?php if( get('edit') && $getRecord['status'] == 0) echo ' checked ';  ?> />
									<label class='inline' for="status">Disable</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary" name="save">Save</button>
						<button type="button" class="btn" onclick="window.location.replace('<?php echo back_url('ads/'); ?>');">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php }?>
<!-- Add / Update ad ends -->