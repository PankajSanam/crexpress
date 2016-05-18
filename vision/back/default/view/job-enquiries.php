<?php top_navigation(); ?>
<div class="container-fluid" id="content">
	<?php left_sidebar(); ?>
	<div id="main">
		<div class="container-fluid">
			<div class="page-header"><div class="pull-left"><h1>Job Enquiries</h1></div><?php sub_header(); ?></div>
			<div class="breadcrumbs">
				<ul>
					<li><a href="dashboard.html">Home</a><i class="icon-angle-right"></i></li>
					<li><a href="job-enquiries.html">Job Enquiries</a></li>
				</ul>
				<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box box-color box-bordered">
						<div class="box-title"><h3>Job Enquiries</h3></div>
						<div class="box-content nopadding">
							<table class="table table-hover table-nomargin table-bordered dataTable-columnfilter dataTable dataTable-tools dataTable-reorder">
								<thead>
									<tr class='thefilter'>
										<th class='with-checkbox'></th>
										<th>ID</th>
										<th>Job ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Message</th>
										<th class='hidden-350'>Status</th>
										<th class='hidden-1024'>Mobile</th>
										<th class='hidden-480'>Options</th>
									</tr>
									<tr>
										<th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
										<th>ID</th>
										<th>Job ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Message</th>
										<th class='hidden-350'>Status</th>
										<th class='hidden-1024'>Mobile</th>
										<th class='hidden-480'>Options</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$job_enquiries = Db::select('job_enquiries');
									foreach($job_enquiries as $job_enquiry){
									?>
									<tr>
										<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
										<td><?php echo $job_enquiry['id']; ?></td>
										<td><?php echo $job_enquiry['job_id']; ?></td>
										<td><?php echo $job_enquiry['name']; ?></td>
										<td><?php echo $job_enquiry['email']; ?></td>
										<td><?php echo $job_enquiry['message'];?></td>
										<td class='hidden-350'><?php echo Helper::status($job_enquiry['status']); ?></td>
										<td class='hidden-1024'><?php echo $job_enquiry['mobile'];?></td>
										<td class='hidden-480'>
											<a href="manage-job-enquiry.html?action=view&id=<?php echo $job_enquiry['id'];?>" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
											<a href="#" class="btn" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
										</td>
									</tr>
									<?php 
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>