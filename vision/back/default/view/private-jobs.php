<?php top_navigation(); ?>
<div class="container-fluid" id="content">
	<?php left_sidebar(); ?>
	<div id="main">
		<div class="container-fluid">
			<div class="page-header"><div class="pull-left"><h1>Private Jobs</h1></div><?php sub_header(); ?></div>
			<div class="breadcrumbs">
				<ul>
					<li><a href="dashboard.html">Home</a><i class="icon-angle-right"></i>			</li>
					<li><a href="private-jobs.html">Private Jobs</a><i class="icon-angle-right"></i></li>
					<li><a href="post-private-job.html">Post Private Job</a></li>
				</ul>
				<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="box box-color box-bordered">
						<div class="box-title"><h3>Pages Management</h3></div>
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
									<?php
									$private_jobs = Db::select('private_jobs');
									foreach($private_jobs as $private_job){
									?>
									<tr>
										<td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
										<td><?php echo $private_job['id']; ?></td>
										<td><?php echo PrivateJob::category_name($private_job['job_category_id']) ?></td>
										<td><?php echo $private_job['title']; ?></td>
										<td><?php echo $private_job['slug']; ?></td>
										<td class='hidden-350'><?php echo Helper::status($private_job['status']); ?></td>
										<td class='hidden-1024'><?php echo $private_job['post_date'];?></td>
										<td class='hidden-1024'><?php echo $private_job['end_date'];?></td>
										<td class='hidden-480'>
											<a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
											<a href="post-private-job.html?action=edit&id=<?php echo $private_job['id'];?>" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
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