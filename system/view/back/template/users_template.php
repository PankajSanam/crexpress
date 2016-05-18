<?php if(!isset($_GET['action']) AND !isset($_GET['id'])) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-user"></i>Users Management</h3></div>
			<div class="box-content nopadding">
				<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
					<thead>
						<tr class='thefilter'>
							<th class='with-checkbox'></th>
							<th>ID</th>
							<th>Username</th>
							<th>Email</th>
							<th>Mobile</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-1024'>Registration Date</th>
							<th class='hidden-480'>Options</th>
						</tr>
						<tr>
							<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
							<th>ID</th>
							<th>Username</th>
							<th>Email</th>
							<th>Mobile</th>
							<th class='hidden-350'>Status</th>
							<th class='hidden-1024'>Registration Date</th>
							<th class='hidden-480'>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($users as $user){ ?>
						<tr>
							<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
							<td><?php echo $user['id']; ?></td>
							<td><?php echo $user['username']; ?></td>
							<td><?php echo $user['email']; ?></td>
							<td><?php echo $user['mobile']; ?></td>
							<td class='hidden-350'><?php echo status($user['status']); ?></td>
							<td class='hidden-1024'><?php echo $user['date'];?></td>
							<td class='hidden-480'>
								<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
								<a href="users.html?action=edit&id=<?php echo $user['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
								<a href="?delete=<?php echo $encrypt->lock($user['id']); ?>" onclick="return ConfirmDelete();" class="btn" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
							</td>
						</tr>
						<?php 
						}
						?>
					</tbody>
				</table>
				<?php 
				if(isset($_GET['delete'])){
					$Db = new Db;
					$id = $encrypt->unlock($_GET['delete']);
					$Db->delete('users',array( 'id=' => $id ));
					redirect('users.html');
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php if(isset($_GET['action'])) {?>
<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title"><h3><i class="icon-user"></i><?php echo ucfirst($_GET['action']);?></h3></div>
			<div class="box-content nopadding">
				<?php
				foreach($edit_data as $edit){}
					extract($edit);
				?>
				<form method="POST" class='form-horizontal form-bordered form-wysiwyg ' enctype='multipart/form-data'>
					<div class="control-group">
						<label for="menu_name" class="control-label">Username</label>
						<div class="controls">
							<input type="text" name="username" id="username" value="<?php if(isset($_GET['id'])) echo $username; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<div class="control-group">
						<label for="menu_name" class="control-label">Email</label>
						<div class="controls">
							<input type="text" name="email" id="email" value="<?php if(isset($_GET['id'])) echo $email; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<div class="control-group">
						<label for="menu_name" class="control-label">Password</label>
						<div class="controls">
							<input type="text" name="password" id="password" value="<?php if(isset($_GET['id'])) echo $password; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<div class="control-group">
						<label for="menu_name" class="control-label">First Name</label>
						<div class="controls">
							<input type="text" name="first_name" id="first_name" value="<?php if(isset($_GET['id'])) echo $first_name; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<div class="control-group">
						<label for="menu_name" class="control-label">Last Name</label>
						<div class="controls">
							<input type="text" name="last_name" id="last_name" value="<?php if(isset($_GET['id'])) echo $last_name; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<?php /*<div class="control-group">
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
					</div> */ ?>
					<div class="control-group">
						<label for="textfield" class="control-label">Pincode</label>
						<div class="controls">
							<input type="text" name="pincode" id="pincode" value="<?php if(isset($_GET['id'])) echo $pincode; ?>" class="input-small" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Date of Birth</label>
						<div class="controls">
							<input type="text" name="dob" id="dob" class="input-medium datepick" value="<?php if(isset($_GET['id'])) echo $dob; ?>">
							<span class="help-block">Birth date of user.</span>
						</div>
					</div>
					<div class="control-group">
						<label for="textfield" class="control-label">Gender</label>
						<div class="controls">
							<div class="input-large">
								<select name="gender" id="gender" class='chosen-select'>
									<option value=""></option>
									<option value="Male" <?php if(isset($_GET['id']) && $gender=='Male') echo ' selected ';  ?>>Male</option>
									<option value="Female" <?php if(isset($_GET['id']) && $gender=='Female') echo ' selected ';  ?>>Female</option>
								</select>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="menu_name" class="control-label">Mobile</label>
						<div class="controls">
							<input type="text" name="mobile" id="mobile" value="<?php if(isset($_GET['id'])) echo $mobile; ?>" class="input-medium" data-rule-required="true" data-rule-minlength="2">
						</div>
					</div>
					<div class="control-group">
						<label for="textarea" class="control-label">Address</label>
						<div class="controls">
							<textarea name="address" id="address" rows="5" style="width:300px;" class="input-block-level" data-rule-required="true" data-rule-minlength="2"><?php if(isset($_GET['id'])) echo $address; ?></textarea>
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
				$Db = new Db;

				if(isset($_GET['action'])) {
					$values = array(
						'username' => $_POST['username'],
						'email' => $_POST['email'],
						'password' => $_POST['password'],
						'first_name' => $_POST['first_name'],
						'last_name' => $_POST['last_name'],
						'dob' => $_POST['dob'],
						'gender' => $_POST['gender'],
						'mobile' => $_POST['mobile'],
						'state_id' => $_POST['state_id'],
						'city_id' => $_POST['city_id'],
						'pincode' => $_POST['pincode'],
						'address' => $_POST['address'],
						'status' => $_POST['status'],
					);
					$Db->update('users',$values,array( 'id=' => $_GET['id'] ));

				} else {
					$values = array(
						'date' => date('Y-m-d'),
						'username' => $_POST['username'],
						'email' => $_POST['email'],
						'password' => $_POST['password'],
						'first_name' => $_POST['first_name'],
						'last_name' => $_POST['last_name'],
						'dob' => $_POST['dob'],
						'gender' => $_POST['gender'],
						'mobile' => $_POST['mobile'],
						'state_id' => $_POST['state_id'],
						'city_id' => $_POST['city_id'],
						'pincode' => $_POST['pincode'],
						'address' => $_POST['address'],
						'status' => $_POST['status'],
					);
					$Db->insert('users',$values);
				}
				redirect("users.html");
			}
			?>
		</div>
	</div>
</div>
<?php } ?>