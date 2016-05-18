<?php include 'view/header.php'; ?>
<?php top_navigation(); ?>
<div class="container-fluid" id="content">
	<?php left_sidebar(); ?>
	<div id="main">
		<div class="container-fluid">
			<div class="page-header"><div class="pull-left"><h1>User Management</h1></div><?php sub_header(); ?></div>
			<div class="breadcrumbs">
				<ul>
					<li><a href="dashboard.php">Home</a><i class="icon-angle-right"></i></li>
					<li><a href="users.php">User Management</a><i class="icon-angle-right"></i></li>
					<li><a href="manage-users.php">Add Users</a></li>
				</ul>
				<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box box-color box-bordered">
						<div class="box-title"><h3>User Management</h3></div>
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
									<?php
									$users = Db::select('users');
									foreach($users as $user){
									?>
									<tr>
										<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
										<td><?php echo $user['id']; ?></td>
										<td><?php echo $user['username']; ?></td>
										<td><?php echo $user['email']; ?></td>
										<td><?php echo $user['mobile']; ?></td>
										<td class='hidden-350'><?php echo Helper::status($user['status']); ?></td>
										<td class='hidden-1024'><?php echo $user['date'];?></td>
										<td class='hidden-480'>
											<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
											<a href="manage-users.php?action=edit&id=<?php echo $user['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
											<a href="?delete=<?php echo Encrypt::lock($user['id']); ?>" onclick="return ConfirmDelete();" class="btn" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
										</td>
									</tr>
									<?php 
									}
									?>
								</tbody>
							</table>
							<?php 
							if(isset($_GET['delete'])){
								$id = Encrypt::unlock($_GET['delete']);
								Db::delete('users',array( 'id=' => $id ));
								Helper::redirect('users.php');
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'view/footer.php'; ?>