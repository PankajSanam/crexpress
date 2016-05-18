<?php echo $navigation; ?>
<div class="container-fluid" id="content">
	<?php echo $left_sidebar; ?>
	<div id="main">
		<div class="container-fluid">
			<?php echo $sub_header; ?>
			<div class="row-fluid margin-top">
				<div class="span12">
					<div class="alert alert-info">
						<h4>Greetings Admin!</h4>
						<p>Welcome to GIT BOX, a complete Content Management Framework solution.</p>
						<p>Please check below before using GIT BOX-</p>
						<ul>
							<li>Sitemap link in robots.txt.</li>
							<li>Rewrite base path in htaccess.</li>
							<li>Site URL in route file.</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="box box-color box-bordered">
						<div class="box-title">
							<h3><i class="icon-bar-chart"></i>Audience Overview</h3>
							<div class="actions">
								<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
								<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
								<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
							</div>
						</div>
						<div class="box-content">
							<div class="statistic-big">
								<div class="top">
									<div class="left">
										<div class="input-medium">
											<select name="category" class='chosen-select' data-nosearch="true">
												<option value="1">Visits</option>
												<option value="2">New Visits</option>
												<option value="3">Unique Visits</option>
												<option value="4">Pageviews</option>
											</select>
										</div>
									</div>
									<div class="right">8,195 <span><i class="icon-circle-arrow-up"></i></span></div>
								</div>
								<div class="bottom"><div class="flot medium" id="flot-audience"></div></div>
								<div class="bottom">
									<ul class="stats-overview">
										<li><span class="name">Visits</span><span class="value">11,251</span></li>
										<li><span class="name">Pages / Visit</span><span class="value">8.31</span></li>
										<li><span class="name">Avg. Duration</span><span class="value">00:06:41</span></li>
										<li><span class="name">% New Visits</span><span class="value">67,35%</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="box box-color box-bordered green">
						<div class="box-title">
							<h3><i class="icon-bullhorn"></i>Feeds</h3>
							<div class="actions">
								<a href="#" class="btn btn-mini custom-checkbox checkbox-active">Automatic refresh<i class="icon-check-empty"></i></a>
							</div>
						</div>
						<div class="box-content nopadding scrollable" data-height="400" data-visible="true">
							<table class="table table-nohead" id="randomFeed">
								<tbody>
									<tr>
										<td>
											<span class="label"><i class="icon-plus"></i></span> <a href="#">John Doe</a> added a new photo
										</td>
									</tr>
									<tr>
										<td>
											<span class="label label-success"><i class="icon-user"></i></span> New user registered
										</td>
									</tr>
									<tr>
										<td>
											<span class="label label-info"><i class="icon-shopping-cart"></i></span> New order received
										</td>
									</tr>
									<tr>
										<td>
											<span class="label label-warning"><i class="icon-comment"></i></span> <a href="#">John Doe</a> commented on <a href="#">News #123</a>
										</td>
									</tr>
									<tr>
										<td>
											<span class="label label-success"><i class="icon-user"></i></span> New user registered
										</td>
									</tr>
									<tr>
										<td>
											<span class="label label-info"><i class="icon-shopping-cart"></i></span> New order received
										</td>
									</tr>
									<tr>
										<td>
											<span class="label label-warning"><i class="icon-comment"></i></span> <a href="#">John Doe</a> commented on <a href="#">News #123</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>