<div class="maindiv">
	<?php //echo $left_widget; ?>
	<div class="middle-panel">
		<div class="college-listing"><h1>College Listing Details</h1></div>
		<div class="arrow"></div>
		<div class="college-details">
			<div class="college-details-page">
				<h1><?php echo $page_title; ?></h1>
				<?php echo $featured_image; ?>
				<?php echo $page_content; ?>
			</div>
			<div class="tabs">
				<div class="demo_wrapper" id="getfresh_demo_wrapper" style="display: block;">
					<div class="tabs_holder tabs_wrapper skin1 top" style="display: block; overflow: visible; position: relative; float:left; width:742px;">
						<ul class="tabs_header">
							<li class="tab_header_item first_tab tab_selected">
								<span class="header_item_before"></span>
								<a href="#tabs-1" class="tabs-1-tab_header">About</a>
								<span class="header_item_after"></span>
							</li>
							<li class="tab_header_item">
								<span class="header_item_before"></span>
								<a href="#tabs-2" class="tabs-2-tab_header">Courses</a>
								<span class="header_item_after"></span>
							</li>
							<li class="tab_header_item last_tab">
								<span class="header_item_before"></span>
								<a href="#tabs-3" class="tabs-3-tab_header">Contact</a>
								<span class="header_item_after"></span>
							</li>
							<?php /*<li class="tab_header_item last_tab tab_selected">
								<span class="header_item_before"></span>
								<a rel="ajax_tab.html" href="#tabs-4" class="tabs-4-tab_header" ajax_loaded="1"> Ajax content</a>
								<span class="header_item_after"></span>
							</li>*/?>
						</ul>
						<div class="content_holder">
							<div class="content_holder_inner" style="overflow: hidden; position: relative; z-index: 1; padding: 0px 0px; text-align:justify;">
								<div id="tabs-1" class="tab_content" style="display: none;">
									<div class="inner_content"><?php echo $about_us; ?></div>
								</div>
								<!-- /#tabs-1 -->
								<div id="tabs-2" class="tab_content" style="display: none;">
									<div class="inner_content"><?php echo $courses; ?></div>
								</div>
								<!-- /#tabs-2 -->
								<div id="tabs-3" class="tab_content" style="display: none;">
									<div class="inner_content"><?php echo $contact_us; ?></div>
								</div>
								<!-- /#tabs-3 -->
							</div>
						</div>
						<!-- /.content_holder -->
						<div style="height: 0px; font-size: 1px; line-height: 1px; clear: both;"></div>
					</div>
					<!-- /.tabs_holder --> 
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php echo $right_widget; ?>
</div>