<?php function hdd_usage() { ?>
<div class="span6">
	<div class="box box-color lightred box-bordered">
		<div class="box-title">
			<h3>
				<i class="icon-bar-chart"></i>
				HDD usage
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
								<option value="1">Today</option>
								<option value="2">Yesterday</option>
								<option value="3">Last week</option>
								<option value="4">Last month</option>
							</select>
						</div>
					</div>
					<div class="right">
						50% <span><i class="icon-circle-arrow-right"></i></span>
					</div>
				</div>
				<div class="bottom">
					<div class="flot medium" id="flot-hdd"></div>
				</div>
				<div class="bottom">
					<ul class="stats-overview">
						<li>
							<span class="name">
								Usage
							</span>
							<span class="value">
								50%
							</span>
						</li>
						<li>
							<span class="name">
								Usage % / User
							</span>
							<span class="value">
								0.031
							</span>
						</li>
						<li>
							<span class="name">
								Avg. Usage %
							</span>
							<span class="value">
								60%
							</span>
						</li>
						<li>
							<span class="name">
								Idle Usage %
							</span>
							<span class="value">
								12%
							</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>