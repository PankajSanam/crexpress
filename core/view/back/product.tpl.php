<!-- Product Listing Starts here -->
<?php if(!isset($_GET['product']) && !isset($_GET['category']) && !isset($_GET['feature'])) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3>Product Management</h3></div>
			<div class="box-content nopadding">
				<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
					<thead>
						<tr class='thefilter'>
							<th class='with-checkbox'></th>
							<th>ID</th>
							<th>Category</th>
							<th>Title</th>
							<th>Slug</th>
							<th>Price (Rs.)</th>
							<th>Sort Order</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
						<tr>
							<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
							<th>ID</th>
							<th>Category</th>
							<th>Title</th>
							<th>Slug</th>
							<th>Price (Rs.)</th>
							<th>Sort Order</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach($products_data as $products) { 
							if($products['is_product']==0) $arg = 'category'; else $arg = 'product';
						?>
						<tr>
							<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
							<td><?php echo $products['product_id']; ?></td>
							<td><?php echo $product->category_title($products['parent_id']); ?></td>
							<td><?php echo $products['title']; ?></td>
							<td><a target="_blank" href="<?php echo page_url($products['slug']); ?>"><?php echo $products['slug']; ?></a></td>
							<td>Rs. <?php echo $products['price']; ?></td>
							<td><?php echo $products['sort_order']; ?></td>
							<td class='hidden-350'><?php echo status($products['status']); ?></td>
							<td class='hidden-480'>
								<!--<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>-->
								<?php if ( $products['is_product'] == 1 ) { ?>
								<a href="product.html?feature=<?php echo $products['product_id'];?>" class="btn" rel="tooltip" title="Feature"><i class="glyphicon-more_items"></i></a>
								<?php } ?>
								<a href="product.html?<?php echo $arg; ?>=edit&id=<?php echo $products['product_id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
								<a href="product.html?delete=<?php echo $encrypt->lock($products['product_id']); ?>" onclick="return ConfirmDelete();" class="btn" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
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

					if($product->delete_product($id)){
						redirect('product.html');
					} else {
						alert('This item cannot be deleted. First remove sub categories and products associated with this item.');
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<!-- Product Listing ends here -->

<!-- Add Product starts here -->
<?php if(isset($_GET['product']) || isset($_GET['category'])) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-th-list"></i> Manage Product</h3></div>
			<div class="box-content nopadding">
				<?php foreach($edit_data as $edit){}
					extract($edit); ?>
				<ul class="tabs tabs-inline tabs-top">
					<li class='active'><a href="#contentoption" data-toggle='tab'><i class="glyphicon-pencil"></i> Content</a></li>
					<li><a href="#menuoption" data-toggle='tab'><i class="glyphicon-cogwheels"></i> Menu Settings</a></li>
					<li><a href="#seo" data-toggle='tab'><i class="glyphicon-globe_af"></i> SEO Settings</a></li>
					<li><a href="#other" data-toggle='tab'><i class="glyphicon-circle_info"></i> Other</a></li>
				</ul>
				<form method="POST" class='form-horizontal form-bordered form-wysiwyg ' enctype='multipart/form-data'>
					<div class="tab-content nopadding tab-content-inline tab-content-bottom">
						<div class="tab-pane active" id="contentoption">
							<div class="span12">
								<div class="span6">
									<div class="control-group">
										<label for="title" class="control-label">Title</label>
										<div class="controls">
											<input type="text" name="title" id="title" value="<?php if(isset($_GET['id'])) echo $title; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
										</div>
									</div>
								</div>
								<div class="span6">
									<div class="control-group_">
										<!-- <label for="featured_image" class="control-label">Featured Image</label> -->
										<div class="controls_">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 130px; height: 100px;">
													<?php if(isset($_GET['id']) AND $image!='') { ?>
													<img src=<?php echo DATA_VIEW; ?>"/product/<?php echo $image; ?>" />
													<?php } else { ?>
													<img src="<?php echo BACK_VIEW; ?>/img/no_image.gif" />
													<?php } ?>
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width:200px; max-height:150px; line-height:20px;"></div>
												<span class="btn btn-file">
													<span class="fileupload-new">Select image</span>
													<span class="fileupload-exists">Change</span>
													<input type="file" name='image' />
												</span>
												<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												<?php if(isset($image) AND isset($_GET['id'])) { ?>
												<input class="btn" type="submit" name="remove_image" value="Remove Image" />
												<?php } ?>
												<?php
												if(isset($_POST['remove_image'])){
													$Db = new Db;
													$Db->update('product',array( 'image' => '' ),array( 'product_id=' => $_GET['id'] ));
													$remove_file = DATA_PATH.'/product/'.$image;
													@unlink($remove_file);
													$url ='product.html?product=edit&id='.$_GET['id'];
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
									<label for="file" class="control-label">Upload Doc</label>
									<div class="controls">
										<input type="file" name="file" id="file" class="input-block-level">
									</div>
								</div>
								<div class="control-group">
									<label for="content" class="control-label">Content</label>
									<div class="controls">
										<textarea name="content" class='ckeditor span12' rows="5" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $content; ?></textarea>
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn btn-primary" name="save">Save changes</button>
									<button type="button" class="btn" onClick="history.go(-1);">Cancel</button>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="menuoption">
							<div class="control-group">
								<label for="menu_sort_order" class="control-label">Menu Sort Order</label>
								<div class="controls">
									<input type="text" name="sort_order" id="sort_order" value="<?php if(isset($_GET['id'])) echo $sort_order; ?>" class="input-small" data-rule-required="true" data-rule-minlength="2">
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary" name="save">Save changes</button>
								<button type="button" class="btn" onClick="history.go(-1);">Cancel</button>
							</div>
						</div>
						<div class="tab-pane" id="seo">
							<div class="control-group">
								<label for="slug" class="control-label">Slug</label>
								<div class="controls">
									<input type="text" name="slug" id="slug" value="<?php if(isset($_GET['id'])) echo $slug; ?>" class="input-xlarge" data-rule-required="true">
								</div>
							</div>
							<div class="control-group">
								<label for="meta_title" class="control-label">Meta Title</label>
								<div class="controls">
									<input type="text" name="meta_title" id="meta_title" value="<?php if(isset($_GET['id'])) echo $meta_title; ?>" class="input-xlarge" data-rule-required="true">
								</div>
							</div>
							<div class="control-group">
								<label for="meta_description" class="control-label">Meta Description</label>
								<div class="controls">
									<textarea name="meta_description" id="meta_description" rows="5" style="width:300px;" class="input-block-level" data-rule-required="true"><?php if(isset($_GET['id'])) echo $meta_description; ?></textarea>
								</div>
							</div>
							<div class="control-group">
								<label for="meta_keywords" class="control-label">Meta Keywords</label>
								<div class="controls">
									<div class="span12">
										<input type="text" name="meta_keywords" id="meta_keywords" value="<?php if(isset($_GET['id'])) echo $meta_keywords; ?>" class="tagsinput" value="tutorial,education" data-rule-required="true">
									</div>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary" name="save">Save changes</button>
								<button type="button" class="btn" onClick="history.go(-1);">Cancel</button>
							</div>
						</div>
						<div class="tab-pane" id="other">
							<div class="control-group">
								<label for="parent_id" class="control-label">Parent Category</label>
								<div class="controls">
									<div class="input-large">
										<select name="parent_id" id="parent_id" class='chosen-select'>
											<option value="0">--Select--</option>
											<?php foreach($products_data as $products_cat) { ?>
											<option value="<?php echo $products_cat['product_id'];?>" <?php if(isset($_GET['id']) && $parent_id==$products_cat['product_id']) echo ' selected ';  ?>><?php echo $products_cat['title'];?></option>
											<?php } ?>
										</select>
									</div>
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
											<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="0" <?php if(isset($_GET['id']) AND $status==0) echo ' checked '; else echo ''; ?>> <label class='inline' for="status">Disable</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary" name="save">Save changes</button>
								<button type="button" class="btn" onClick="history.go(-1);">Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<?php
			if(isset($_POST['save'])){
				if(isset($_GET['product'])) {
					if($_FILES['image']['name']!=''){
						$image = $upload->image($_FILES['image'], DATA_PATH.'/product/');
					} else {
						$image = $image;
					}
					
					if($_FILES['file']['name']!=''){
						$file = $upload->doc($_FILES['file'], DATA_PATH.'/product/');
					} else {
						$file = $file;
					}
					
				} else {
					$image = $upload->image($_FILES['image'], DATA_PATH.'/product/');
					$file = $upload->doc($_FILES['file'], DATA_PATH.'/product/');
				}

				$Db = new Db;
				
				$meta_title = ($_POST['meta_title']!='' ? $_POST['meta_title'] : $_POST['title']);
				$is_product = (isset($_GET['product']) ? 1 : 0 );
				$page_template_id = (isset($_GET['product']) ? 6 : 7 );

				if($_POST['slug']!=''){
					$slug = $sanitize->clean($_POST['slug']);
				} else {
					$slug = $sanitize->clean($_POST['title']);
				}

				$values = array(
					'parent_id'			=> 	$_POST['parent_id'],
					'is_product'		=> 	$is_product,
					'page_template_id'	=>	$page_template_id,
					'slug' 				=> 	$slug,
					'title' 			=> 	$_POST['title'],
					'content' 			=> 	$_POST['content'],
					'image'				=> 	$image,
					'file'				=>	$file,
					'price'				=> 	$_POST['price'],
					'meta_title' 		=> 	$meta_title,
					'meta_description' 	=> 	$_POST['meta_description'],
					'meta_keywords' 	=> 	strtolower($_POST['meta_keywords']),
					'sort_order'		=> 	$_POST['sort_order'],
					'status' 			=> 	$_POST['status']
				);

				if(isset($_GET['product']) && $_GET['product'] == 'edit' || isset($_GET['category']) && $_GET['category'] == 'edit' ){
					$Db->update('product',$values, array( 'product_id=' => $_GET['id'] ));
				} else {
					$Db->insert('product',$values);
				}

				//generate_sitemap();
				redirect('product.html');
			}
			?>
		</div>
	</div>
</div>
<?php } ?>
<!-- Add Product ends -->

<!-- Feature listing begins -->
<?php if(!isset($_GET['product']) && !isset($_GET['category']) && isset($_GET['feature']) && !isset($_GET['action']) ) {?>
<br />
<a href="product.html?feature=<?php echo $_GET['feature'];?>&action=add" class="btn" rel="tooltip" title="Add Feature"><i class="icon-plus"></i></a>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3>Product Features</h3></div>
			<div class="box-content nopadding">
				<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
					<thead>
						<tr class='thefilter'>
							<th class='with-checkbox'></th>
							<th>ID</th>
							<th>Title</th>
							<th>Image</th>
							<th>Sort Order</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
						<tr>
							<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
							<th>ID</th>
							<th>Title</th>
							<th>Image</th>
							<th>Sort Order</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-480'>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$Db = new Db;
						$feature_data = $Db->select('product_feature', array( 'product_id=' => $_GET['feature'] ));

						foreach($feature_data as $feature) { 
						?>
						<tr>
							<td class="with-checkbox"><input type="checkbox" name="check" value="1" /></td>
							<td><?php echo $feature['id']; ?></td>
							<td><?php echo $feature['title']; ?></td>
							<td><?php echo $feature['image']; ?></td>
							<td><?php echo $feature['sort_order']; ?></td>
							<td class='hidden-350'><?php echo status($feature['status']); ?></td>
							<td class='hidden-480'>
								<a href="product.html?feature=<?php echo $_GET['feature'];?>&action=add" class="btn" rel="tooltip" title="Add Feature"><i class="icon-plus"></i></a>
								<a href="product.html?feature=<?php echo $_GET['feature'];?>&action=edit&id=<?php echo $feature['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
								<a href="product.html?feature=<?php echo $_GET['feature'];?>&delete=<?php echo $encrypt->lock($feature['id']); ?>" onclick="return ConfirmDelete();" class="btn" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
							</td>
						</tr>
						<?php 
						}
						?>
					</tbody>
				</table>
				<?php 
				if( isset($_GET['feature']) && isset($_GET['delete']) ){
					$enc_id = trim($_GET['delete']);
					$id = $encrypt->unlock($enc_id);

					if($product->delete_feature($id)){
						redirect('product.html?feature='.$_GET['feature']);
					} else {
						alert('This item cannot be deleted.');
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<!-- Feature Listing ends here -->

<!-- Add Feature starts here -->
<?php if( isset($_GET['feature']) && isset($_GET['action']) ) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-th-list"></i> Manage Features</h3></div>
			<div class="box-content nopadding">
				<?php foreach($edit_feature_data as $edit_feature){}
					extract($edit_feature); ?>
				<form method="POST" class='form-horizontal form-bordered form-wysiwyg ' enctype='multipart/form-data'>
					<div class="tab-content nopadding tab-content-inline tab-content-bottom">
						<div class="tab-pane active" id="contentoption">
							<div class="span12">
								<div class="span6">
									<div class="control-group">
										<label for="title" class="control-label">Title</label>
										<div class="controls">
											<input type="text" name="title" id="title" value="<?php if(isset($_GET['id'])) echo $title; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
										</div>
									</div>
								</div>
							</div>
							<div class="span12">
								<div class="span6">
									<div class="control-group_">
										<label for="featured_image" class="control-label">Featured Image</label>
										<div class="controls_">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 130px; height: 100px;">
													<?php if(isset($_GET['id']) AND $image!='') { ?>
													<img src=<?php echo DATA_VIEW; ?>"/product/<?php echo $image; ?>" />
													<?php } else { ?>
													<img src="<?php echo BACK_VIEW; ?>/img/no_image.gif" />
													<?php } ?>
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width:200px; max-height:150px; line-height:20px;"></div>
												<span class="btn btn-file">
													<span class="fileupload-new">Select image</span>
													<span class="fileupload-exists">Change</span>
													<input type="file" name='image' />
												</span>
												<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												<?php if(isset($image) AND isset($_GET['id'])) { ?>
												<input class="btn" type="submit" name="remove_image" value="Remove Image" />
												<?php } ?>
												<?php
												if(isset($_POST['remove_image'])){
													$Db = new Db;
													$Db->update('product_feature',array( 'image' => '' ),array( 'id=' => $_GET['id'] ));
													$remove_file = DATA_PATH.'/product/'.$image;
													@unlink($remove_file);
													redirect('product.html?feature='.$_GET['feature']);
												}
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="control-group">
								<label for="menu_sort_order" class="control-label">Menu Sort Order</label>
								<div class="controls">
									<input type="text" name="sort_order" id="sort_order" value="<?php if(isset($_GET['id'])) echo $sort_order; ?>" class="input-small" data-rule-required="true" data-rule-minlength="2">
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
											<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="1" <?php if(isset($_GET['id']) AND $status==1) echo ' checked '; else echo ' checked';  ?>> <label class='inline' for="status">Enable</label>
										</div>
										<div class="check-line">
											<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="0" <?php if(isset($_GET['id']) AND $status==0) echo ' checked '; else echo ''; ?>> <label class='inline' for="status">Disable</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary" name="save">Save changes</button>
								<button type="button" class="btn" onclick="history.go(-1);">Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<?php
			if(isset($_POST['save'])){
				$Db = new Db;
				
				if(isset($_GET['product'])) {
					if($_FILES['image']['name']!=''){
						$image = $upload->image($_FILES['image'], DATA_PATH.'/product/');
					} else {
						$image = $image;
					}
				} else {
					$image = $upload->image($_FILES['image'], DATA_PATH.'/product/');
				}
				
				if(isset($_GET['feature']) && isset($_GET['action']) && $_GET['action'] == 'edit' ){
					$values = array(
						'title' 			=> 	$_POST['title'],
						'image'				=>	$image,
						'content' 			=> 	$_POST['content'],
						'sort_order'		=> 	$_POST['sort_order'],
						'status' 			=> 	$_POST['status']
					);
					
					$Db->update('product_feature',$values, array( 'id=' => $_GET['id'] ));
				} else {
					$values = array(
						'product_id'		=>	$_GET['feature'],
						'title' 			=> 	$_POST['title'],
						'image'				=>	$image,
						'content' 			=> 	$_POST['content'],
						'sort_order'		=> 	$_POST['sort_order'],
						'status' 			=> 	$_POST['status']
					);
					
					$Db->insert('product_feature',$values);
				}

				//generate_sitemap();

				redirect('product.html?feature='.$_GET['feature']);
			}
			?>
		</div>
	</div>
</div>
<?php } ?>
<!-- Add Feature ends -->