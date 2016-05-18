<?php if( !isset($_GET['add']) AND !isset($_GET['id']) ) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3>Software Management</h3></div>
			<div class="box-content nopadding">
				<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
					<thead>
						<tr class='thefilter'>
							<th class='with-checkbox'></th>
							<th>ID</th>
							<th>Name</th>
							<th>File</th>
							<th>Description</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
						<tr>
							<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
							<th>ID</th>
							<th>Name</th>
							<th>File</th>
							<th>Description</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($software_list as $soft) { ?>
						<tr>
							<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
							<td><?php echo $soft['id']; ?></td>
							<td><?php echo $soft['name']; ?></td>
							<td><?php echo $soft['file']; ?></td>
							<td><?php echo $soft['description']; ?></td>
							<td class='hidden-350'><?php echo status($soft['status']); ?></td>
							<td class='hidden-480'>
								<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
								<a href="software.html?action=edit&id=<?php echo $soft['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
								<a href="software.html?delete=<?php echo $encrypt->lock($soft['id']); ?>" onclick="return ConfirmDelete();" class="btn" rel="tooltip" title="Delete">
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
    			if(isset($_GET['delete'])){
					$enc_id = trim($_GET['delete']);
					$id = $encrypt->unlock($enc_id);

					$Db = new Db;
                    $Db->delete('software',array( 'id=' => $id ));
                    redirect('software.html');
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php if( isset($_GET['add']) OR isset($_GET['id']) ) { ?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-th-list"></i>Manage Softwares</h3></div>
			<div class="box-content nopadding">
				<?php
				foreach($edit_data as $edit){}
					extract($edit);
				?>
				<form method="POST" class='form-horizontal form-bordered form-wysiwyg ' enctype='multipart/form-data'>
					<div class="control-group">
						<label for="menu_name" class="control-label">Name</label>
						<div class="controls">
							<input type="text" name="name" id="name" value="<?php if(isset($_GET['id'])) echo $name; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2" />
						</div>
					</div>
					<div class="control-group">
						<label for="file" class="control-label">Upload Software</label>
						<div class="controls">
							<input type="file" name="file" id="file" class="input-block-level">
							<span class="help-block">Only .zip and .exe (Max Size: 64MB)</span>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Description</label>
						<div class="controls">
							<textarea name="description" class='span6' rows="5"><?php if(isset($_GET['id'])) echo $description; ?></textarea>
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
					if($_FILES['file']['name']!=''){
						$remove_file1 = DATA_PATH.'/software/'.$file;
						@unlink($remove_file1);

						$file = $upload->exe($_FILES['file'], DATA_PATH.'/software/');
					} else {
						$file = $file;
					}
				} else {
					$remove_file1 = DATA_PATH.'/software/'.$file;
					@unlink($remove_file1);

					$file = $upload->exe($_FILES['file'], DATA_PATH.'/software/');
				}

				$values = array(
					'name' => $_POST['name'],
					'file' => $file,
					'description' => $_POST['description'],
					'status' => $_POST['status']
				);
				$Db = new Db;
				if(isset($_GET['action'])){
					$Db->update('software',$values,array( 'id=' => $_GET['id'] ));
				} else {
					$Db->insert('software',$values);
				}

				redirect("software.html");
			}
			?>
		</div>
	</div>
</div>
<?php } ?>