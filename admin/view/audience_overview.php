<?php function audience_overview() { ?>
<div class="span6">
	<div class="box box-color box-bordered">
		<div class="box-title">
			<h3>
				<i class="icon-bar-chart"></i>
				Audience Overview
			</h3>
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
					<div class="right">
						8,195 <span><i class="icon-circle-arrow-up"></i></span>
					</div>
				</div>
				<div class="bottom">
					<div class="flot medium" id="flot-audience"></div>
				</div>
				<div class="bottom">
					<ul class="stats-overview">
						<li>
							<span class="name">
								Visits
							</span>
							<span class="value">
								11,251
							</span>
						</li>
						<li>
							<span class="name">
								Pages / Visit
							</span>
							<span class="value">
								8.31
							</span>
						</li>
						<li>
							<span class="name">
								Avg. Duration
							</span>
							<span class="value">
								00:06:41
							</span>
						</li>
						<li>
							<span class="name">
								% New Visits
							</span>
							<span class="value">
								67,35%
							</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>