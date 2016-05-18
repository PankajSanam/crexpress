<?php if(!isset($_GET['action']) AND !isset($_GET['id'])) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-riflescope"></i>Product Management</h3></div>
			<div class="box-content nopadding">
				<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
					<thead>
						<tr class='thefilter'>
							<th class='with-checkbox'></th>
							<th>ID</th>
							<th>Title</th>
							<th>Image</th>
							<th>Price (Rs.)</th>
							<th>Content</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
						<tr>
							<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
							<th>ID</th>
							<th>Title</th>
							<th>Image</th>
							<th>Price (Rs.)</th>
							<th>Content</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($products as $product) { ?>
						<tr>
							<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
							<td><?php echo $product['id']; ?></td>
							<td><?php echo $product['title']; ?></td>
							<td><img src="<?php echo DATA_VISION; ?>/shop/<?php echo $product['image']; ?>" width="140" /></td>
							<td>Rs. <?php echo $product['price']; ?></td>
							<td><?php echo $product['content']; ?></td>
							<td class='hidden-350'><?php echo status($product['status']); ?></td>
							<td class='hidden-480'>
								<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
								<a href="shop.html?action=edit&id=<?php echo $product['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
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
						<label for="title" class="control-label">Title</label>
						<div class="controls">
							<input type="text" name="title" id="title" value="<?php if(isset($_GET['id'])) echo $title; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<div class="control-group">
						<label for="image" class="control-label">Image</label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
									<?php 
									if(isset($_GET['id']) && $image!='') {
									?>
									<img src="<?php echo DATA_VISION; ?>/shop/<?php echo $image; ?>" />
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
									<?php if(isset($image) AND $image!='') { ?>
									<input class="btn" type="submit" name="remove_image" value="Remove Image" />
									<?php } ?>
									<?php
									if(isset($_POST['remove_image'])){
										$Db = new Db;
										$Db->update('shop',array( 'image' => ''	),array( 'id=' => $_GET['id'] ));
										$url ='shop.html?action=edit&id='.$_GET['id'];
										redirect($url);
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="price" class="control-label">Price</label>
						<div class="controls">
							<input type="text" name="price" id="price" value="<?php if(isset($_GET['id'])) echo $price; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<div class="control-group">
						<label for="content" class="control-label">Content</label>
						<div class="controls">
							<textarea name="content" class='ckeditor span12' rows="5" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $content; ?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label for="status" class="control-label">Status</label>
						<div class="controls">
							<div class="check-demo-col">
								<div class="check-line">
									<input type="radio" id="status" name="status" class='icheck-me' data-skin="square" data-color="blue" value="1" <?php if(isset($_GET['id']) && $status==1) echo ' checked '; else echo ' checked';  ?>> <label class='inline' for="status">Enable</label>
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
					if($_FILES['image']['name']!=''){
						$image = $upload->image($_FILES['image'], DATA_PATH.'/shop/');
					} else {
						$image = $image;
					}
				} else {
					$image = $upload->image($_FILES['image'], DATA_PATH.'/shop/');
				}

				$values = array(
					'title' => $_POST['title'],
					'image' => $image,
					'price' => $_POST['price'],
					'content' => $_POST['content'],
					'status' => $_POST['status'],
				);
				$Db = new Db;
				if(isset($_GET['action'])){
					$Db->update('shop',$values,array( 'id=' => $_GET['id'] ));
				} else {
					$Db->insert('shop',$values);	
				}
				redirect("shop.html");
			}
			?>
		</div>
	</div>
</div>
<?php } ?>