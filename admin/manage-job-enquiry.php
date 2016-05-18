<?php include 'view/header.php'; ?>
<?php top_navigation(); ?>
<div class="container-fluid" id="content">
	<?php left_sidebar(); ?>
	<div id="main">
		<div class="container-fluid">
			<div class="page-header">
				<?php
				if(isset($_GET['action']) && $_GET['action']=='view'){
					$page_action = 'View Enquiry';
					$enquiries_data = Db::select('job_enquiries',array( 'id=' => $_GET['id']));
					foreach($enquiries_data as $enquiry_data){
						extract($enquiry_data);
					}
				} else {
					$page_action = 'Add New';
				}
				?>
				<div class="pull-left"><h1><?php echo $page_action; ?></h1></div>
				<?php sub_header(); ?>
			</div>
			<div class="breadcrumbs">
				<ul>
					<li><a href="dashboard.php">Home</a><i class="icon-angle-right"></i></li>
					<li><a href="enquiry.php">Enquiry Management</a></li>
				</ul>
				<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box box-color box-bordered">
						<div class="box-title"><h3><i class="icon-th-list"></i> <?php echo $page_action; ?></h3></div>
						<div class="box-content nopadding">
							<form method="POST" class='form-horizontal form-bordered form-wysiwyg ' enctype='multipart/form-data'>
								<div class="control-group">
									<label for="menu_name" class="control-label">Enquiry Date</label>
									<div class="controls">
										<input type="text" name="date" id="date" value="<?php if(isset($_GET['id'])) echo $date; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
									</div>
								</div>
								<div class="control-group">
									<label for="menu_name" class="control-label">Name</label>
									<div class="controls">
										<input type="text" name="name" id="name" value="<?php if(isset($_GET['id'])) echo $name; ?>" class="input-large" data-rule-required="true" data-rule-minlength="2">
									</div>
								</div>
								<div class="control-group">
									<label for="textfield" class="control-label">Email</label>
									<div class="controls">
										<input type="text" name="email" id="email" value="<?php if(isset($_GET['id'])) echo $email; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2">
									</div>
								</div>
								<div class="control-group">
									<label for="textfield" class="control-label">Mobile</label>
									<div class="controls">
										<input type="text" name="mobile" id="mobile" value="<?php if(isset($_GET['id'])) echo $mobile; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="2">
									</div>
								</div>
								<div class="control-group">
									<label for="textfield" class="control-label">Status</label>
									<div class="controls">
										<div class="check-demo-col">
											<div class="check-line">
												<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="1" <?php if(isset($_GET['id']) && $status==1) echo ' checked ';  ?>> <label class='inline' for="status">Enable</label>
											</div>
											<div class="check-line">
												<input type="radio" id="status" class='icheck-me' name="status" data-skin="square" data-color="blue" value="0" <?php if(isset($_GET['id']) && $status==0) echo ' checked ';  ?>> <label class='inline' for="status">Disable</label>
											</div>
										</div>
									</div>
								</div>
								<!--<div class="form-actions">
									<button type="submit" class="btn btn-primary" name="add_page">Save changes</button>
									<button type="button" class="btn" onClick="history.go(-1);">Cancel</button>
								</div>-->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'view/footer.php'; ?>