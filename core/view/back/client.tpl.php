<?php if( !get('edit') && !get('add') ) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3>Client Logo Management</h3></div>
			<div class="box-content nopadding">
				<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
					<thead>
						<tr class='thefilter'>
							<th class='with-checkbox'></th>
							<th>ID</th>
							<th>Name</th>
							<th>Image</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
						<tr>
							<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all" /></th>
							<th>ID</th>
							<th>Name</th>
							<th>Image</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($client_logos as $cLogo) { ?>
						<tr>
							<td class="with-checkbox"><input type="checkbox" name="check" value="1" /></td>
							<td><?php echo $cLogo['id']; ?></td>
							<td><?php echo $cLogo['name']; ?></td>
							<td><img width="100" height="100" src="<?php echo DATA_VIEW; ?>/client/<?php echo $cLogo['image']; ?>" /></td>
							<td class='hidden-350'><?php echo status($cLogo['status']); ?></td>
							<td class='hidden-480'>
								<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
								<a href="<?php echo ADMIN_PATH; ?>client/edit/<?php echo $cLogo['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
								<a href="<?php echo ADMIN_PATH; ?>client/delete/<?php echo $encrypt->lock($cLogo['id']); ?>" onclick="return ConfirmDelete();" class="btn" rel="tooltip" title="Delete">
                                    <i class="icon-remove"></i>
                                </a>
							</td>
						</tr>
						<?php 
						}
						?>
					</tbody>
				</table>
                <?php 
    			if( get('delete') ){
					$enc_id = trim( get('delete') );
					$id = $encrypt->unlock($enc_id);

					$Db = new Db;
                    $Db->delete('client',array( 'id=' => $id ));
                    $url = ADMIN_PATH.'client/';
                    redirect($url);
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php if( get('edit') || get('add') ) { ?>
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
						<label for="menu_name" class="control-label">Name</label>
						<div class="controls">
							<input type="text" name="name" id="name" value="<?php if( get('edit') ) echo $name; ?>" class="input-large" />
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Logo Image</label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
									<?php 
									if( get('edit') && $image!='' ) {
									?>
									<img src="<?php echo DATA_VIEW; ?>/client/<?php echo $image; ?>" />
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
										<input type="file" name='image' />
									</span>
									<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
									<?php if(isset($image)) { ?>
									<input class="btn" type="submit" name="remove_image" value="Remove Image" />
									<?php } ?>
									<?php
									if(isset($_POST['remove_image'])){
										$Db = new Db;
										$Db->update('client',array( 'image' => '' ), array( 'id=' => get('edit') ));
										$remove_file1 = DATA_PATH.'/slider/'.$image;
										@unlink($remove_file1);
										$url = ADMIN_PATH.'client/edit/'.get('edit');
										redirect($url);
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Status</label>
						<div class="controls">
							<div class="check-demo-col">
								<div class="check-line">
									<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="1" <?php if( get('edit') && $status==1) echo ' checked '; else echo ' checked'; ?> /> <label class='inline' for="status">Enable</label>
								</div>
								<div class="check-line">
									<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="0" <?php if( get('edit') && $status==0) echo ' checked ';  ?> /> <label class='inline' for="status">Disable</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary" name="save">Save changes</button>
						<button type="button" class="btn" onclick="history.go(-1);">Cancel</button>
					</div>
				</form>
			</div>
			<?php
			if(isset($_POST['save']))
			{
				if( get('edit') ) 
				{
					if($_FILES['image']['name']!='')
					{
						$remove_file1 = DATA_PATH.'/client/'.$image;
						@unlink($remove_file1);

						$image = $upload->image($_FILES['image'], DATA_PATH.'/client/');
					}
				} 
				else 
				{
					$remove_file1 = DATA_PATH.'/slider/'.$image;
					@unlink($remove_file1);

					$image = $upload->image($_FILES['image'], DATA_PATH.'/client/');
				}

				$values = array(
					'name' => $_POST['name'],
					'image' => $image,
					'status' => $_POST['status']
				);
				
				$Db = new Db;
				if( get('edit') )
				{
					$Db->update('client',$values,array( 'id=' => $_GET['id'] ));
				} 
				else 
				{
					$Db->insert('client',$values);
				}
				
				$url = ADMIN_PATH.'client/';
				redirect($url);
			}
			?>
		</div>
	</div>
</div>
<?php } ?>