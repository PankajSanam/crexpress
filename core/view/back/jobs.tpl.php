<?php if(!isset($_GET['action']) AND !isset($_GET['id'])) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-riflescope"></i>Jobs Management</h3></div>
			<div class="box-content nopadding">
				<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
					<thead>
						<tr class='thefilter'>
							<th class='with-checkbox'></th>
							<th>ID</th>
							<th>Job Category</th>
							<th>Job Title</th>
							<th>Job Slug</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-1024'>Post Date</th>
							<th class='hidden-1024'>End Date</th>
							<th class='hidden-480'>Options</th>
						</tr>
						<tr>
							<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
							<th>ID</th>
							<th>Job Category</th>
							<th>Job Title</th>
							<th>Job Slug</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-1024'>Post Date</th>
							<th class='hidden-1024'>End Date</th>
							<th class='hidden-480'>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($private_jobs as $private_job) { ?>
						<tr>
							<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
							<td><?php echo $private_job['id']; ?></td>
							<td><?php echo category_name('job_categories',$private_job['job_category_id']); ?></td>
							<td><?php echo $private_job['title']; ?></td>
							<td><?php echo $private_job['slug']; ?></td>
							<td class='hidden-350'><?php echo status($private_job['status']); ?></td>
							<td class='hidden-1024'><?php echo $private_job['post_date'];?></td>
							<td class='hidden-1024'><?php echo $private_job['end_date'];?></td>
							<td class='hidden-480'>
								<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
								<a href="jobs.html?action=edit&id=<?php echo $private_job['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
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
						<label for="textfield" class="control-label">Job Category</label>
						<div class="controls">
							<div class="input-xlarge">
								<select name="job_category_id" id="job_category_id" class='chosen-select'>
									<option value=""></option>
									<?php foreach($job_categories as $job_category) { ?>
									<option value="<?php echo $job_category['id'];?>" <?php if(isset($_GET['id']) && $job_category_id==$job_category['id']) echo ' selected ';  ?>><?php echo @$job_category['name'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="menu_name" class="control-label">Job Title</label>
						<div class="controls">
							<input type="text" name="title" id="title" value="<?php if(isset($_GET['id'])) echo $title; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<?php /* <div class="control-group">
						<label for="textfield" class="control-label">State</label>
						<div class="controls">
							<div class="input-xlarge">
								<select name="state_id" id="state_id" class='chosen-select' onchange="load_options(this.value,'state');">
									<option value=""></option>
									<?php 
									$states = Location::states();
									foreach($states as $state) {
									?>
									<option value="<?php echo $state['id'];?>" <?php if(isset($_GET['id']) && $state_id==$state['id']) echo ' selected ';  ?>><?php echo @$state['name'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">City</label>
						<div class="controls">
							<div class="input-xlarge">
								<select name="city_id"  id="city_id" class='chosen-select' onchange="load_options(this.value,'city');">
									<option value=""></option>
									<?php 
									$cities = Location::cities();
									foreach($cities as $city) {
									?>
									<option value="<?php echo $city['id'];?>" <?php if(isset($_GET['id']) && $city_id==$city['id']) echo ' selected ';  ?>><?php echo @$city['name'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Locality</label>
						<div class="controls">
							<div class="input-xlarge">
								<select name="locality_id" id="locality_id" class='chosen-select'>
									<option value=""></option>
									<?php 
									$localities = Location::localities();
									foreach($localities as $locality) {
									?>
									<option value="<?php echo $locality['id'];?>" <?php if(isset($_GET['id']) && $locality_id==$locality['id']) echo ' selected ';  ?>><?php echo @$locality['name'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>*/ ?>
					<div class="control-group">
						<label for="menu_name" class="control-label">Salay From</label>
						<div class="controls">
							<input type="text" name="salary_from" id="salary_from" value="<?php if(isset($_GET['id'])) echo $salary_from; ?>" class="input-medium" data-rule-required="true" data-rule-minlength="2">
							<span class="help-block">Salary per month.</span>
						</div>
					</div>
					<div class="control-group">
						<label for="menu_name" class="control-label">Salay To</label>
						<div class="controls">
							<input type="text" name="salary_to" id="salary_to" value="<?php if(isset($_GET['id'])) echo $salary_to; ?>" class="input-medium" data-rule-required="true" data-rule-minlength="2">
							<span class="help-block">Salary per month.</span>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Timings</label>
						<div class="controls">
							<div class="input-large">
								<select name="timings" id="timings" class='chosen-select'>
									<option value=""></option>
									<option value="Full Time - Day Shift" <?php if(isset($_GET['id']) && $timings=='Full Time - Day Shift') echo ' selected ';  ?>>Full Time - Day Shift</option>
									<option value="Full Time - Night Shift" <?php if(isset($_GET['id']) && $timings=='Full Time - Night Shift') echo ' selected ';  ?>>Full Time - Night Shift</option>
									<option value="Part Time - Day Shift" <?php if(isset($_GET['id']) && $timings=='Part Time - Day Shift') echo ' selected ';  ?>>Part Time - Day Shift</option>
									<option value="Part Time - Night Shift" <?php if(isset($_GET['id']) && $timings=='Part Time - Night Shift') echo ' selected ';  ?>>Part Time - Night Shift</option>
								</select>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Minimum Experience Required</label>
						<div class="controls">
							<input type="text" name="minimum_experience" id="minimum_experience" value="<?php if(isset($_GET['id'])) echo $minimum_experience; ?>" class="input-small" data-rule-required="true" data-rule-minlength="2">
							<span class="help-block">Required minimum experience.</span>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Maximum Experience Required</label>
						<div class="controls">
							<input type="text" name="maximum_experience" id="maximum_experience" value="<?php if(isset($_GET['id'])) echo $maximum_experience; ?>" class="input-small" data-rule-required="true" data-rule-minlength="2">
							<span class="help-block">Required maximum experience.</span>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Preferred Gender</label>
						<div class="controls">
							<div class="input-large">
								<select name="gender" id="gender" class='chosen-select'>
									<option value=""></option>
									<option value="Any" <?php if(isset($_GET['id']) && $gender=='Any') echo ' selected ';  ?>>Any</option>
									<option value="Male" <?php if(isset($_GET['id']) && $gender=='Male') echo ' selected ';  ?>>Male</option>
									<option value="Female" <?php if(isset($_GET['id']) && $gender=='Female') echo ' selected ';  ?>>Female</option>
								</select>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Available Positions</label>
						<div class="controls">
							<input type="text" name="vacancies" id="vacancies" value="<?php if(isset($_GET['id'])) echo $vacancies; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2">
							<span class="help-block">Available Vacancies in job posting.</span>
						</div>
					</div>
					<div class="control-group">
						<label for="textarea" class="control-label">Job Address</label>
						<div class="controls">
							<textarea name="address" id="address" rows="5" style="width:300px;" class="input-block-level" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $address; ?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Contact Number</label>
						<div class="controls">
							<input type="text" name="contact_number" id="contact_number" value="<?php if(isset($_GET['id'])) echo $contact_number; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Expirty Date</label>
						<div class="controls">
							<input type="text" name="end_date" id="end_date" class="input-medium datepick" value="<?php if(isset($_GET['id'])) echo $end_date; ?>">
							<span class="help-block">Job ending date.</span>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Meta Title</label>
						<div class="controls">
							<input type="text" name="meta_title" id="meta_title" value="<?php if(isset($_GET['id'])) echo $meta_title; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2">
							<span class="help-block">This will be shown on pages.</span>
						</div>
					</div>
					<div class="control-group">
						<label for="textarea" class="control-label">Meta Description</label>
						<div class="controls">
							<textarea name="meta_description" id="meta_description" rows="5" style="width:300px;" class="input-block-level" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $meta_description; ?></textarea>
							<span class="help-block">Please enter meta description.</span>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Meta Keywords</label>
						<div class="controls">
							<div class="span12">
								<input type="text" name="meta_keywords" id="meta_keywords" value="<?php if(isset($_GET['id'])) echo $meta_keywords; ?>" class="tagsinput" value="tutorial,education" data-rule-required="true" data-rule-minlength="2">
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Featured Image</label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
									<?php 
									if(isset($_GET['id']) && $featured_image!='') {
									?>
									<img src="<?php echo DATA_VIEW; ?>/pages/<?php echo $featured_image; ?>" />
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
										<input type="file" name='featured_image' />
									</span>
									<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
									<?php if(isset($featured_image) AND $featured_image!='') { ?>
									<input class="btn" type="submit" name="remove_image" value="Remove Image" />
									<?php } ?>
									<?php
									if(isset($_POST['remove_image'])){
										$Db = new Db;
										$Db->update('private_jobs',array( 'featured_image' => ''	),array( 'id=' => $_GET['id'] ));
										$url ='jobs.html?action=edit&id='.$_GET['id'];
										redirect($url);
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Job Description</label>
						<div class="controls">
						<a href="#media-manager" data-toggle="modal" class="btn btn-primary"><i class="icon-picture"></i> Add Media</a><br/><br/>
							<textarea name="content" class='ckeditor span12' rows="5" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $content; ?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Status</label>
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
						$featured_image = $upload->image($_FILES['featured_image'], DATA_PATH.'/pages/');
					} else {
						$featured_image = $featured_image;
					}
				} else {
					$featured_image = $upload->image($_FILES['featured_image'], DATA_PATH.'/pages/');
				}

				$values = array(
					'job_category_id' => $_POST['job_category_id'],
					'post_date' => date('Y-m-d'),
					'end_date' => $_POST['end_date'],
					'country_id' => 1,
					'state_id' => $_POST['state_id'],
					'city_id' => $_POST['city_id'],
					'locality_id' => $_POST['locality_id'],
					'contact_number' => $_POST['contact_number'],
					'address' => $_POST['address'],
					'vacancies' => $_POST['vacancies'],
					'salary_from' => $_POST['salary_from'],
					'salary_to' => $_POST['salary_to'],
					'timings' => $_POST['timings'],
					'gender' => $_POST['gender'],
					'minimum_experience' => $_POST['minimum_experience'],
					'maximum_experience' => $_POST['maximum_experience'],
					'slug' => $sanitize->clean($_POST['title']),
					'title' => $_POST['title'],
					'content' => $_POST['content'],
					'featured_image' => $featured_image,
					'meta_title' => $_POST['meta_title'],
					'meta_description' => $_POST['meta_description'],
					'meta_keywords' => strtolower($_POST['meta_keywords']),
					'sort_order' => 0,
					'status' => $_POST['status'],
				);
				$Db = new Db;
				if(isset($_GET['action'])){
					$Db->update('private_jobs',$values,array( 'id=' => $_GET['id'] ));
				} else {
					$Db->insert('private_jobs',$values);	
				}
				redirect("jobs.html");
			}
			?>
		</div>
	</div>
</div>
<?php } ?>